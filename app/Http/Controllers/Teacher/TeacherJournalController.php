<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Models\LessonSchedule;
use App\Models\TeacherJournal;
use App\Http\Controllers\Controller;
use App\Services\Teacher\TeacherJournalService;
use App\Http\Requests\StoreTeacherJournalRequest;
use App\Http\Requests\UpdateTeacherJournalRequest;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Services\AttendanceJournalService;
use App\Contracts\Interfaces\LessonHourInterface; // Added LessonHourInterface
use Illuminate\Http\Request;

class TeacherJournalController extends Controller
{
    private AttendanceJournalService $serviceAttendance;
    private AttendanceJournalInterface $attendanceJournal;
    private TeacherJournalInterface $teacherJournal;
    private LessonScheduleInterface $lessonSchedule;
    private TeacherJournalService $service;
    private ClassroomStudentInterface $classroomStudent;
    private LessonHourInterface $lessonHour; // Added property for LessonHourInterface

    public function __construct(TeacherJournalInterface $teacherJournal, AttendanceJournalInterface $attendanceJournal, TeacherJournalService $service, LessonScheduleInterface $lessonSchedule, ClassroomStudentInterface $classroomStudent, AttendanceJournalService $serviceAttendance, LessonHourInterface $lessonHour)
    {
        $this->serviceAttendance = $serviceAttendance;
        $this->attendanceJournal = $attendanceJournal;
        $this->teacherJournal = $teacherJournal;
        $this->lessonSchedule = $lessonSchedule;
        $this->service = $service;
        $this->classroomStudent = $classroomStudent;
        $this->lessonHour = $lessonHour; // Initialize the LessonHourInterface property
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teacherSchedules = $this->lessonSchedule->whereTeacher(auth()->user()->id, now());
        // dd($teacherSchedules);
        $histories = $this->teacherJournal->histories(auth()->user()->id, $request);
        // dd($teacherSchedules);
        return view('teacher.pages.journals.index', compact('teacherSchedules', 'histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(LessonSchedule $lessonSchedule)
    {
        $classroomStudents = $this->classroomStudent->getByClassId($lessonSchedule->classroom->id);
        return view('teacher.pages.journals.create', compact('classroomStudents', 'lessonSchedule'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherJournalRequest $request, LessonSchedule $lessonSchedule)
    {
        try {
            $data = $this->service->store($request, $lessonSchedule);
            $teacherJournal = $this->teacherJournal->store($data);
            $this->serviceAttendance->storeJournal($request['attendance'], $teacherJournal);
            return to_route('teacher.journals.index')->with('success', 'Berhasil mengirim jurnal');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherJournal $journal)
    {
        $attendanceJournals = $journal->attendanceJournals;
        return view('teacher.pages.journals.detail', compact('journal', 'attendanceJournals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherJournal $teacherJournal)
    {
        $classroomStudents = $this->attendanceJournal->getByTeacherJournal($teacherJournal->id);
        return view('teacher.pages.journals.update', compact('teacherJournal', 'classroomStudents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherJournalRequest $request, TeacherJournal $teacherJournal)
    {
        try {
            $data = $this->service->update($request, $teacherJournal->lessonSchedule);
            $this->teacherJournal->update($teacherJournal->id, $data);
            $this->serviceAttendance->updateJournal($request['attendance'], $teacherJournal);
            return to_route('teacher.journals.index')->with('success', 'Berhasil mengupdate jurnal');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherJournal $teacherJournal)
    {
        try {
            $this->teacherJournal->delete($teacherJournal->id);
            return redirect()->back()->with('success', 'Berhasi menghapus jurnal');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }
}
