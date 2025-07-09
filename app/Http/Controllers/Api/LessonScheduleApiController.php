<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Http\Resources\ClassroomStudentResource;
use App\Http\Resources\LessonScheduleResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherJournalRequest;
use App\Http\Requests\UpdateTeacherJournalRequest;
use App\Http\Resources\AttendanceJournalResource;
use App\Http\Resources\HistoryJournalResource;
use App\Models\LessonSchedule;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\AttendanceJournalService;
use App\Services\Teacher\TeacherJournalService;

class LessonScheduleApiController extends Controller
{
    private LessonScheduleInterface $lessonSchedule;
    private ClassroomStudentInterface $classroomStudent;
    private TeacherJournalInterface $teacherJournal;
    private AttendanceJournalService $serviceAttendance;
    private TeacherJournalService $serviceJournal;
    private AttendanceJournalInterface $attendanceJournal;

    public function __construct(LessonScheduleInterface $lessonSchedule, ClassroomStudentInterface $classroomStudent,
    TeacherJournalInterface $teacherJournal, AttendanceJournalService $serviceAttendance, TeacherJournalService $serviceJournal,
    AttendanceJournalInterface $attendanceJournal,
    )
    {
        $this->lessonSchedule = $lessonSchedule;
        $this->classroomStudent = $classroomStudent;
        $this->teacherJournal = $teacherJournal;
        $this->serviceAttendance = $serviceAttendance;
        $this->serviceJournal = $serviceJournal;
        $this->attendanceJournal = $attendanceJournal;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $lessonSchedules = $this->lessonSchedule->whereTeacher($user->id, now());
        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => LessonScheduleResource::collection($lessonSchedules)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(LessonSchedule $lessonSchedule)
    {
        $classroomStudents = $this->classroomStudent->getByClassId($lessonSchedule->classroom->id);
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengambil data',
            'code' => 200,
            'data' => [
                'subject' => $lessonSchedule->teacherSubject->subject->name,
                'classroom' => $lessonSchedule->classroom->name,
                'classroom_students' => ClassroomStudentResource::collection($classroomStudents)
            ]
        ]);
    }

        /**
     * Display the specified resource.
     */
    public function show(LessonSchedule $lessonSchedule)
    {
        $classroomStudents = $this->classroomStudent->getByClassId($lessonSchedule->classroom->id);
        $teacherJournal = $this->teacherJournal->getByLessonSchedule($lessonSchedule->id);
        $attendanceJournals = $teacherJournal != null ? $this->attendanceJournal->getByTeacherJournal($teacherJournal->id) : null;

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengambil data',
            'code' => 200,
            'data' => [
                'title' => $teacherJournal != null ? $teacherJournal->title : null,
                'description' => $teacherJournal != null ? $teacherJournal->description : null,
                'date' => $teacherJournal != null ? $teacherJournal->date : null,
                'classroom_students' => $teacherJournal != null ? AttendanceJournalResource::collection($attendanceJournals) : ClassroomStudentResource::collection($classroomStudents)
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonSchedule $lessonSchedule, StoreTeacherJournalRequest $request)
    {
        $data = $this->serviceJournal->store($request, $lessonSchedule);
        $teacherJournal = $this->teacherJournal->store($data);
        $this->serviceAttendance->storeJournal($request['attendance'], $teacherJournal);
        return response()->json(['status' => 'success', 'message' => "Berhasil menambahkan jurnal",'code' => 200]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonSchedule $lessonSchedule, UpdateTeacherJournalRequest $request)
    {
        // dd($request->validated());
        $data = $this->serviceJournal->update($request, $lessonSchedule);
        $this->teacherJournal->update($lessonSchedule->teacherJournals->first()->id, $data);
        $this->serviceAttendance->updateJournal($request['attendance'], $lessonSchedule->teacherJournals->first());
        return response()->json(['status' => 'success', 'message' => "Berhasil mengedit jurnal",'code' => 200]);
    }

    /**
     * Display the specified resource.
     */
    public function history(User $user, Request $request)
    {
        $histories = $this->teacherJournal->histories($user->id, $request);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => HistoryJournalResource::collection($histories)]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
