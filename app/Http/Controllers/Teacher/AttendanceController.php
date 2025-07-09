<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private ClassroomStudentInterface $studentClass;
    private AttendanceInterface $attendance;

    public function __construct(AttendanceInterface $attendance, ClassroomStudentInterface $studentClass)
    {
        $this->attendance = $attendance;
        $this->studentClass = $studentClass;
    }

    public function index()
    {
        $attendances = $this->attendance->whereUser(auth()->user()->employee->id, 'App\Models\Employee');
        return view('teacher.pages.attendance-history.index', compact('attendances'));
    }
}
