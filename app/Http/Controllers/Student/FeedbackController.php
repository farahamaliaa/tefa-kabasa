<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\FeedbackInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\LessonSchedule;
use App\Services\FeedbackService;

class FeedbackController extends Controller
{
    private FeedbackInterface $feedback;
    private FeedbackService $service;
    private ClassroomStudentInterface $classroomStudent;
    private LessonScheduleInterface $lessonSchedule;

    public function __construct(FeedbackInterface $feedback, FeedbackService $service, ClassroomStudentInterface $classroomStudent, LessonScheduleInterface $lessonSchedule)
    {
        $this->feedback = $feedback;
        $this->service = $service;
        $this->classroomStudent = $classroomStudent;
        $this->lessonSchedule = $lessonSchedule;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classroomStudent = $this->classroomStudent->whereStudent(auth()->user()->student->id);
        $lessonSchedules = $this->lessonSchedule->whereDay($classroomStudent->classroom->id);
        $student_id = auth()->user()->student->id;
        $feedbacks = $this->feedback->where_user_id($student_id);
        return view('student.pages.class.index', compact('feedbacks', 'classroomStudent', 'lessonSchedules', 'student_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request, LessonSchedule $lessonSchedule)
    {
        $id = auth()->user()->student->id;
        $data = $this->service->store($request, $lessonSchedule, $id);
        $this->feedback->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan feedback');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $classroomStudent = $this->classroomStudent->whereStudent(auth()->user()->student->id);
        $lessonSchedules = $this->lessonSchedule->whereClassroom($classroomStudent->classroom->id, 'day');
        $student_id = auth()->user()->student->id;
        return view('student.pages.class.panes.all-schedule', compact('classroomStudent', 'lessonSchedules', 'student_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $this->feedback->update($feedback->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil mengedit feedback');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $this->feedback->delete($feedback->id);
        return redirect()->back()->with('success', 'Berhasil menghapus feedback');
    }
}
