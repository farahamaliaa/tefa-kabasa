<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\FeedbackInterface;
use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentFeedbackController extends Controller
{
    private TeacherSubjectInterface $teacherSubject;
    private EmployeeInterface $employee;
    private FeedbackInterface $feedback;

    public function __construct(TeacherSubjectInterface $teacherSubject, EmployeeInterface $employee, FeedbackInterface $feedback)
    {
        $this->teacherSubject = $teacherSubject;
        $this->employee = $employee;
        $this->feedback = $feedback;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teacherSubjects = $this->teacherSubject->getByTeacher(auth()->user()->employee->id);
        $teacher = $this->employee->getByUser(auth()->id());
        $feedbacks = $this->feedback->get_lesson($request);
        return view('teacher.pages.student-feedback.index', compact('teacherSubjects', 'teacher', 'feedbacks'));
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
    public function show(string $id)
    {
        //
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
