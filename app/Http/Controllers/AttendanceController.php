<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\School;
use App\Enums\RoleEnum;
use App\Models\Classroom;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Models\ClassroomStudent;
use App\Exports\AttendanceExport;
use App\Services\AttendanceService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentAttendanceExport;
use App\Exports\TeacherAttendanceExport;
use App\Http\Requests\StoreAttendanceRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\AttendanceTeacherInterface;
use App\Contracts\Repositories\AttendanceTeacherRepository;
use App\Enums\AttendanceEnum;
use App\Http\Requests\AttendanceLicensesRequest;
use App\Models\AttendanceTeacher;
use App\Models\Employee;

class AttendanceController extends Controller
{
    private AttendanceInterface $attendance;
    private AttendanceTeacherInterface $attendanceTeacher;
    private AttendanceTeacherRepository $attendanceTeacherRepository;
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;
    private ClassroomStudentInterface $classroomStudent;
    private StudentInterface $student;
    private SchoolYearInterface $schoolYear;
    private ClassroomInterface $classroom;
    private AttendanceService $service;

    public function __construct(AttendanceInterface $attendance, AttendanceTeacherInterface $attendanceTeacher, AttendanceTeacherRepository $attendanceTeacherRepository, StudentInterface $student, AttendanceRuleInterface $attendanceRule, SchoolYearInterface $schoolYear, ClassroomInterface $classroom, AttendanceService $service)
    {
        $this->attendance = $attendance;
        $this->attendanceTeacher = $attendanceTeacher;
        $this->attendanceTeacherRepository = $attendanceTeacherRepository;
        $this->student = $student;
        $this->attendanceRule = $attendanceRule;
        $this->schoolYear = $schoolYear;
        $this->classroom = $classroom;
        $this->service = $service;
    }

    public function store(Request $request)
    {
        // dd(json_decode($request->getContent()));
        $date = Carbon::create($request->date);
        $day = strtolower($date->format('l'));
        $rule = $this->attendanceRule->showByDay($day, RoleEnum::STUDENT->value);

        if (!$rule) return ResponseHelper::jsonResponse('warning', 'Tidak ada jadwal absensi', null, 404);

        $failedStore = [];
        $updatedCount = 0;
        $data = $this->service->insert(json_decode($request->getContent()), $rule, $date);
        // dd($data);
        try {
            if (!empty($data)) {
                foreach ($data->toArray() as $attendance) {
                    if (isset($attendance['invalid'])) {
                        if ($attendance['invalid']) {
                            $failedStore[] = $attendance['model_id'];
                        }
                    } else {
                        $updated = $this->attendance->updateWithAttribute(['model_id' => $attendance['model_id'], 'model_type' => $attendance['model_type'], 'created_at' => $request->date], $attendance);     
                        // dd($updated);
                        if (!$updated) {
                            $failedStore[] = $attendance['model_id'];
                        } else {
                            $updatedCount += 1;
                        }
                    }
                }
            }
            return response()->json(['status' => 'sukses', 'message' => 'Data kehadiran berhasil dimasukkan. ' . $updatedCount . ' Berhasil, ' . count($failedStore) . ' Gagal', 'invalid' => empty($failedStore) ? null : $failedStore, 'code' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Gagal memasukkan data kehadiran', 'error' => $e->getMessage(), 'code' => 500], 500);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function class(Request $request)
    {
        if ($request->year) {
            $year = $request->year;
        } else {
            $activeYear = $this->schoolYear->active(auth()->user()->school->id);
            $year = $activeYear->school_year;
        }
        $schoolYear = $this->schoolYear->whereSchoolYear($year);
        $classrooms = $this->classroom->whereSchoolYears($schoolYear->id, $request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendance.student.class', compact('schoolYears', 'classrooms'));
    }

    /**
     * Display a listing of the resource.
     */
    public function student(Classroom $classroom)
    {
        $attendances = $this->attendance->whereClassroom($classroom);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendance.student.index', compact('attendances', 'schoolYears', 'classroom'));
    }

    /**
     * Display a listing of the resource.
     */
    public function teacher(Request $request)
    {
        $attendanceTeachers = $this->attendanceTeacher->whereSchool(auth()->user()->school->id, $request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendance.teacher.index', compact('attendanceTeachers', 'schoolYears'));
    }

    public function export_student(Classroom $classroom, Request $request)
    {
        return Excel::download(new StudentAttendanceExport($classroom->id, $request, $this->attendance), 'Kehadiran-siswa-' . $classroom->name . '.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function studentExportPreview(Classroom $classroom, Request $request)
    {
        $attendances = $this->attendance->classAndDate($classroom->id, $request);
        return view('school.pages.attendance.student.export', compact('attendances', 'classroom'));
    }

    /**
     * Display a listing of the resource.
     */
    public function teacherExportPreview(Request $request)
    {
        $attendances = $this->attendanceTeacher->whereSchool(auth()->user()->school->id, $request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendance.teacher.export', compact('attendances', 'schoolYears'));
    }

    public function listAttendance(Request $request)
    {
        return $this->attendance->listAttendance($request->date);
    }
    public function reset(Request $request)
    {
        return $this->attendance->reset($request->date);
    }

    public function proof(AttendanceLicensesRequest $request)
    {
        try {
            
            $this->service->proof($request);
            return redirect()->back()->with('success', 'Berhasil menambahkan perizinan siswa');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan perizinan siswa');
        }
    }

    public function delete_proof(Attendance $attendance)
    {
        $this->attendance->delete($attendance->id);
        return redirect()->back()->with('success', 'Berhasil menghapus perizinan siswa');
    }
}
