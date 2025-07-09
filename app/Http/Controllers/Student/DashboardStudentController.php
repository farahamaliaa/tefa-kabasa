<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Http\Controllers\Controller;
use App\Models\ClassroomStudent;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardStudentController extends Controller
{
    private ClassroomStudentInterface $studentClass;
    private AttendanceInterface $attendance;
    private StudentService $service;

    public function __construct(ClassroomStudentInterface $studentClass, AttendanceInterface $attendance, StudentService $service)
    {
        $this->studentClass = $studentClass;
        $this->attendance = $attendance;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentClasses = $this->studentClass->whereStudent(auth()->user()->student->id);
        if (!$studentClasses) {
            Auth::logout();
            return redirect('/login')->with('error', 'Akun anda belum ada dalam kelas');
        }
        $single_attendance = $this->attendance->userToday('App\Models\ClassroomStudent', $studentClasses->id);
        $history_attendance = $this->attendance->whereUser($studentClasses->id, 'App\Models\ClassroomStudent');
        $chartAttendance = $this->service->chartAttendance(auth()->user()->student->id);
        return view('student.pages.dashboard.dashboard', compact('studentClasses', 'single_attendance', 'history_attendance', 'chartAttendance'));
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
