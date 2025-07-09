<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\LessonHourInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\SubjectInterface;
use App\Http\Requests\ImportLessonScheduleRequest;
use App\Models\LessonSchedule;
use App\Http\Requests\StoreLessonScheduleRequest;
use App\Http\Requests\UpdateLessonScheduleRequest;
use App\Imports\LessonScheduleTimetableImport;
use App\Models\Classroom;
use App\Services\ImportLessonScheduleService;
use App\Services\LessonScheduleService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LessonScheduleController extends Controller
{
    private LessonScheduleInterface $lessonSchedule;
    private ClassroomInterface $classroom;
    private EmployeeInterface $employee;
    private SubjectInterface $subjects;
    private LessonHourInterface $lessonHour;
    private LessonScheduleService $service;
    private SchoolYearInterface $schoolYear;
    private ImportLessonScheduleService $importService;

    public function __construct(LessonScheduleInterface $lessonSchedule, ClassroomInterface $classroom, EmployeeInterface $employee, SubjectInterface $subjects, LessonHourInterface $lessonHour, LessonScheduleService $service, SchoolYearInterface $schoolYear, ImportLessonScheduleService $importService)
    {
        $this->lessonSchedule = $lessonSchedule;
        $this->classroom = $classroom;
        $this->employee = $employee;
        $this->subjects = $subjects;
        $this->lessonHour = $lessonHour;
        $this->service = $service;
        $this->schoolYear = $schoolYear;
        $this->importService = $importService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lessonSchedules = $this->lessonSchedule->get();
        $classrooms = $this->classroom->whereLessonSchedule($request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.lesson-schedule.index', compact('lessonSchedules', 'classrooms', 'schoolYears'));
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
    public function store(StoreLessonScheduleRequest $request, Classroom $classroom, string $day)
    {
        try {
            $this->service->store($request, $classroom, $day);
            return redirect()->back()->with('success', 'Berhasil menambahkan jadwal pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonSchedule $lessonSchedule, Classroom $classroom)
    {
        $teachers = $this->employee->getTeacher();
        $subjects = $this->subjects->get();
        $lessonHours = $this->lessonHour->groupByNot('day', $classroom->id);
        $lessonHourUpdates = $this->lessonHour->groupByNotUpdate('day');
        $lessonSchedules = $this->lessonSchedule->whereClassroom($classroom->id, 'day');
        $latestSchedule = $this->service->get();
        return view('school.pages.lesson-schedule.detail', compact('lessonSchedules', 'classroom', 'teachers', 'subjects', 'lessonHours', 'lessonHourUpdates', 'latestSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonSchedule $lessonSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonScheduleRequest $request, LessonSchedule $lessonSchedule)
    {
        try {
            $this->service->update($request,$lessonSchedule);
            return redirect()->back()->with('success', 'Berhasil memperbaiki jadwal pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonSchedule $lessonSchedule)
    {
        try {
            $this->lessonSchedule->delete($lessonSchedule->id);
            return redirect()->back()->with('success', 'Berhasil menghapus jadwal pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    public function export_pdf(Classroom $classroom)
    {
        $data = $this->lessonSchedule->whereClassroomId($classroom->id);

        $pdf = app('dompdf.wrapper');
        $pdf->setPaper('a4', 'landscape');
        $pdf->setPaper([0, 0, 841.89, 595.28]);

        $pdf->loadView('export-pdf.export-lesson-schedule', ['lessonSchedule' => $data, 'classroom' => $classroom]);
        return $pdf->download('jadwal.pdf');
    }

    public function import(ImportLessonScheduleRequest $request)
    {
        $this->importService->xml($request);
    }
}
