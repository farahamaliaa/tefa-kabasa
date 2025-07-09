<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceTeacherInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Exports\StudentAttendanceExport;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\ClassroomStudent;
use App\Services\AttendanceService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    private ClassroomInterface $classroom;
    private SchoolYearInterface $schoolYear;
    private AttendanceInterface $attendance;
    private AttendanceTeacherInterface $attendanceTeacher;
    private AttendanceService $attendanceService;

    public function __construct(classroomInterface $classroom, SchoolYearInterface $schoolYear, AttendanceInterface $attendance, AttendanceTeacherInterface $attendanceTeacher, AttendanceService $attendanceService)
    {
        $this->classroom = $classroom;
        $this->schoolYear = $schoolYear;
        $this->attendance = $attendance;
        $this->attendanceTeacher = $attendanceTeacher;
        $this->attendanceService = $attendanceService;
    }

    /**
     * menampilkan kehadiran kelas di tahun ajaran yang aktif
     * @param Request $request untuk menampilkan data berdasarkan tahun ajaran
     */
    public function class(Request $request)
    {
        $activeYear = $this->schoolYear->active();

        if($request->has('year')){
            $year = $this->schoolYear->whereSchoolYear($request->year);
            $yearId = $year->id;
        }else{
            $yearId = $activeYear->id;
        }
        $classrooms = $this->classroom->where($request, $yearId);
        // dd($classrooms);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendance.student.class-attendace', compact('classrooms', 'schoolYears'));
    }


    /**
     * menampilkan kehadiran siswa di classroom yang diberikan
     * @param Classroom $classroom classroom yang diberikan
     * @param Request $request untuk menampilkan data berdasarkan tanggal
     */
    public function student(Classroom $classroom, Request $request)
    {
        $attendances = $this->attendance->classAndDate($classroom->id, $request);
        return view('school.pages.attendance.student.list-attendace-student', compact('attendances', 'classroom'));
    }

    public function expotStudent(Request $request, Classroom $classroom)
    {
        $attendances = $this->attendance->exportClassAndDate($classroom->id, $request);
        return view('school.pages.attendance.student.export', compact('attendances', 'classroom'));
    }
    /**
     * menampilkan kehadiran guru
     * @param Request $request untuk menampilkan data berdasarkan tanggal
     */
    public function teacher(Request $request)
    {
        $attendanceTeachers = $this->attendance->attendanceGetTecaher($request);
        return view('school.pages.attendance.teacher.index', compact('attendanceTeachers'));
    }

    /**
     * export kehadiran siswa
     * @param Classroom $classroom classroom yang diberikan
     * @param Request $request untuk menampilkan data berdasarkan tanggal
     */
    public function export_student(Classroom $classroom, Request $request)
    {
        return Excel::download(new StudentAttendanceExport($classroom->id, $request, $this->attendance), 'Kehadiran-'.$classroom->name.$request->date.'.xlsx');
    }

    public function proof(Attendance $attendance, Request $request)
    {
        $data = $this->attendanceService->upload_proof($attendance, $request);
        $this->attendance->update($attendance->id, $data);

        return redirect()->back()->with('success', 'Berhasil menambahkan bukti');
    }
}
