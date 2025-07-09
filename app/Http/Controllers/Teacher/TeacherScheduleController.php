<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Http\Controllers\Controller;

class TeacherScheduleController extends Controller
{
    private LessonScheduleInterface $lessonSchedule;

    public function __construct(LessonScheduleInterface $lessonSchedule)
    {
        $this->lessonSchedule = $lessonSchedule;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherSchedule = $this->lessonSchedule->whereTeacher(auth()->user()->employee->id, now()->format('l'));
        return view('', compact('teacherSchedule'));
    }
}
