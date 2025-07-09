<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\FeedbackInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class SchoolFeedbackController extends Controller
{
    private ClassroomInterface $classroom;
    private LessonScheduleInterface $lessonSchedule;
    private EmployeeInterface $employee;
    private FeedbackInterface $feedback;

    public function __construct(FeedbackInterface $feedback, ClassroomInterface $classroom, LessonScheduleInterface $lessonSchedule, EmployeeInterface $employee)
    {
        $this->classroom = $classroom;
        $this->lessonSchedule = $lessonSchedule;
        $this->employee = $employee;
        $this->feedback = $feedback;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teachers = $this->employee->employeeLesson($request);
        $feedback_id = Permission::where('name', 'active_feedback')->first();
        return view('school.pages.student-feedback.index', compact('teachers', 'feedback_id'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $teacher, Request $request)
    {
        $teacher = $this->employee->showWithSlug($teacher);
        $feedbacks = $this->feedback->get_lesson($request);
        // dd($feedbacks);
        return view('school.pages.student-feedback.detail', compact('teacher', 'feedbacks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
