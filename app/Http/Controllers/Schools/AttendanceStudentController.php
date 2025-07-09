<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Services\AttendanceService;
use App\Services\SchoolChartService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceStudentController extends Controller
{
    private AttendanceInterface $attendance;
    private ClassroomInterface $classroom;
    private SchoolYearInterface $schoolyear;
    private SchoolChartService $schoolChartService;

    public function __construct(AttendanceInterface $attendance, ClassroomInterface $classroom, SchoolYearInterface $schoolyear, SchoolChartService $schoolChartService)
    {
        $this->attendance = $attendance;
        $this->classroom = $classroom;
        $this->schoolyear = $schoolyear;
        $this->schoolChartService = $schoolChartService;
    }

    public function index(Request $request)
    {
        $date = $request->input('date', Carbon::today()->format('Y-m-d'));
        $data = $this->schoolChartService->chartClass($request);
        $classrooms = $this->classroom->whereInSchoolYears($request);

        $attendances = $this->attendance->allStudentWithPagination($request);
        return view('school.pages.statistic-presence.index', compact('data','date', 'classrooms', 'attendances'));
    }

    public function show(Classroom $classroom, Request $request)
    {
        $attendances = $this->attendance->classAndDate($classroom->id, $request);
        return view('school.pages.statistic-presence.detail-presence', compact('classroom', 'attendances'));
    }

    public function exportPreview(Classroom $classroom, Request $request)
    {
        $attendances = $this->attendance->exportClassAndDate($classroom->id, $request);
        return view('school.pages.statistic-presence.export.student', compact('classroom', 'attendances'));
    }
}
