<?php

namespace App\Http\Controllers\Staff;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Exports\StudentViolationExport;
use App\Http\Controllers\Controller;
use App\Imports\StudentViolationImport;
use App\Models\Classroom;
use App\Models\Student;
use App\Services\StaffChartService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StaffViolationController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private StudentRepairInterface $studentRepair;
    private ClassroomInterface $classroom;
    private StudentInterface $student;
    private SchoolPointInterface $schoolPoint;
    private RegulationInterface $regulation;
    private StaffChartService $chartService;

    public function __construct(StudentViolationInterface $studentViolation, StudentInterface $student, ClassroomInterface $classroom, SchoolPointInterface $schoolPoint, StudentRepairInterface $studentRepair, RegulationInterface $regulation, StaffChartService $chartService)
    {
        $this->studentViolation = $studentViolation;
        $this->studentRepair = $studentRepair;
        $this->student = $student;
        $this->classroom = $classroom;
        $this->schoolPoint = $schoolPoint;
        $this->regulation = $regulation;
        $this->chartService = $chartService;
    }

    public function index(Request $request)
    {
        $students = $this->student->getByPoint($request);
        $classrooms = $this->classroom->whereInSchoolYears($request);
        $maxPoint = $this->schoolPoint->getMaxPoint();
        return view('staff.pages.top-violation.index', compact('students', 'classrooms', 'maxPoint'));
    }


    public function overview(Request $request)
    {
        $schoolPoints = $this->schoolPoint->get();
        $max_point = $this->schoolPoint->getMaxPoint();

        $countViolation = $this->studentViolation->count('week');
        $studentViolation = $this->studentViolation->count('student');
        $countRepair = $this->studentRepair->count();
        $studentHighPoint = $this->student->highestPoint($max_point);
        $charts = $this->chartService->violationChart();

        $top_violations = $this->regulation->getOrder();

        $class = $this->studentViolation->countByClassroomStudent();
        $class == null ? $classroom = null : $classroom = $this->classroom->show($class->classroom_id);
        $students = $this->student->orderByPoint();

        return view('staff.pages.overview.index', compact(
            'schoolPoints', 'max_point', 'countViolation', 'studentViolation'
            , 'countRepair', 'studentHighPoint', 'charts', 'top_violations', 'classroom', 'students'
        ));
    }

    public function show(Classroom $classroom, Request $request)
    {
        $studentClass = $this->studentViolation->whereClassroom($classroom->id, $request);
        return view('staff.pages.top-violation.detail-class', compact('studentClass'));
    }

    public function show_detail_student(Student $student, Request $request)
    {
        $violations = $this->studentViolation->whereStudent($student->id, $request);
        $repairs = $this->studentRepair->whereStudent($student->id, $request);
        return view('staff.pages.top-violation.detail-student', compact('student', 'violations', 'repairs'));
    }

    public function list_student(Request $request)
    {
        $classrooms = $this->classroom->getByActiveSchoolYear();
        $studentViolations = $this->studentViolation->search($request);
        $violations = $this->regulation->get();
        $maxPoint = $this->schoolPoint->getMaxPoint();
        return view('staff.pages.violation-student-list.index', compact('studentViolations', 'violations', 'maxPoint', 'classrooms'));
    }

    public function download_student()
    {
        $export = new StudentViolationExport();
        $export->collection();
        return response()->download(storage_path('app/public/siswa-pelanggaran.xlsx'))->deleteFileAfterSend(true);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $import = new StudentViolationImport();
        Excel::import($import, $file);
        return redirect()->back()->with('success', "Berhasil Mengimport Data!");
    }
}
