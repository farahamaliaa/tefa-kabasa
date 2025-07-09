<?php
namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\MapleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\RfidInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\SemesterInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Contracts\Interfaces\SubjectInterface;
use App\Enums\AttendanceEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Models\School;
use App\Services\ModelHasRfidService;
use App\Services\SchoolChartService;
use Illuminate\Http\Request;


class SchoolDashboardController extends Controller
{
    private SchoolInterface $school;
    private SchoolYearInterface $schoolYear;
    private RfidInterface $rfid;
    private ClassroomInterface $classroom;
    private SemesterInterface $semester;
    private AttendanceInterface $attendance;
    private StudentInterface $student;
    private EmployeeInterface $employee;
    private SchoolChartService $schoolChart;
    private SubjectInterface $subjects;
    private ModelHasRfidInterface $modelHasRfid;
    private LessonScheduleInterface $lessonSchedule;
    private SchoolPointInterface $schoolPoints;
    private StudentViolationInterface $studentViolation;

    public function __construct(SchoolInterface $school, SchoolYearInterface $schoolYear,
    RfidInterface $rfid, ClassroomInterface $classroom, SemesterInterface $semester,
    SchoolChartService $schoolChart, AttendanceInterface $attendance, StudentInterface $student,
    EmployeeInterface $employee, SubjectInterface $subjects, ModelHasRfidInterface $modelHasRfid,
    LessonScheduleInterface $lessonSchedule, SchoolPointInterface $schoolPoints, StudentViolationInterface $studentViolation)
    {
        $this->employee = $employee;
        $this->school = $school;
        $this->schoolYear = $schoolYear;
        $this->rfid = $rfid;
        $this->classroom = $classroom;
        $this->semester = $semester;
        $this->attendance = $attendance;
        $this->schoolChart = $schoolChart;
        $this->student = $student;
        $this->subjects = $subjects;
        $this->modelHasRfid = $modelHasRfid;
        $this->lessonSchedule = $lessonSchedule;
        $this->schoolPoints = $schoolPoints;
        $this->studentViolation = $studentViolation;
    }

    public function index(Request $request)
    {
        $classrooms = $this->classroom->countClass();
        $schoolYear = $this->schoolYear->active();
        $semester = $this->semester->whereSchool();

        $attendanceChart = $this->schoolChart->ChartAttendance($this->attendance);
        $violationChart = $this->schoolChart->ChartViolation($this->studentViolation);
        $violations = $this->studentViolation->get();

        $alumni = $this->student->countStudentAlumni();
        $teachers = $this->employee->where(RoleEnum::TEACHER->value);
        $employees = $this->employee->where(RoleEnum::STAFF->value);
        $students = $this->student->count();
        $subjects = $this->subjects->count();

        $schoolPoints = $this->schoolPoints->get();
        $maxPoint = $this->schoolPoints->getMaxPoint();

        $fill = $this->lessonSchedule->dahsboardSchool('fill',now());
        $notfill = $this->lessonSchedule->dahsboardSchool('notfill',now());

        $lates = $this->attendance->AttendanceDasboard('App\Models\ClassroomStudent', AttendanceEnum::LATE->value, $request);
        $alpha = $this->attendance->AttendanceDasboard('App\Models\ClassroomStudent', AttendanceEnum::ALPHA->value, $request);
        $sick = $this->attendance->AttendanceDasboard('App\Models\ClassroomStudent', AttendanceEnum::SICK->value, $request);
        $permit = $this->attendance->AttendanceDasboard('App\Models\ClassroomStudent', AttendanceEnum::PERMIT->value, $request);

        $merged = $sick->merge($permit);
        $totalPermit = $merged->count();

        $lates_teacher = $this->attendance->AttendanceDasboard('App\Models\Employee', AttendanceEnum::LATE->value, $request);
        $alpha_teacher = $this->attendance->AttendanceDasboard('App\Models\Employee', AttendanceEnum::ALPHA->value, $request);
        $sick_teacher = $this->attendance->AttendanceDasboard('App\Models\Employee', AttendanceEnum::SICK->value, $request);
        $permit_teacher = $this->attendance->AttendanceDasboard('App\Models\Employee', AttendanceEnum::PERMIT->value, $request);

        $merged_teacher = $sick_teacher->merge($permit_teacher);
        $totalPermit_teacher = $merged->count();

        $studentChart = $this->schoolChart->chartStudentAttendance($lates, $totalPermit, $alpha);

        return view('school.pages.dashboard.dashboard', compact(
            'lates', 'alpha', 'sick', 'permit', 'totalPermit','lates_teacher', 'alpha_teacher', 'sick_teacher', 'totalPermit_teacher','studentChart',
            'fill','notfill','classrooms', 'violations',
            'schoolYear', 'semester',
            'attendanceChart', 'alumni',
            'teachers', 'employees', 'students',
            'subjects', 'schoolPoints', 'maxPoint', 'violationChart'));
    }

    public function show(Request $request)
    {
        $rfids = $this->modelHasRfid->searchMaster($request);
        $school = $this->school->showWithSlug(auth()->user()->slug);
        $schoolYear = $this->schoolYear->active($school->id);
        return view('school.pages.settings.information', compact('school', 'schoolYear', 'rfids'));
    }

    public function edit()
    {
        $school = $this->school->showWithSlug(auth()->user()->slug);
        return view('school.pages.settings.update-information', compact('school'));
    }
}
