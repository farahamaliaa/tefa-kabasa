<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use App\Enums\AttendanceEnum;
use App\Helpers\ResponseHelper;
use App\Services\AttendanceService;
use App\Contracts\Interfaces\RfidInterface;
use App\Http\Requests\StoreAttendanceRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Http\Resources\StudentAttendacreResource;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Http\Resources\SingleAttendaceStudentResource;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Http\Resources\StudentPresentAttendacreResource;
// use F9Web\ApiResponseHelpers;

class AttendanceStudentController extends Controller
{
    // use ApiResponseHelpers;
    private AttendanceInterface $attendance;
    private ModelHasRfidInterface $modelHasRfid;
    private RfidInterface $rfid;
    private AttendanceRuleInterface $attendanceRule;
    private ClassroomStudentInterface $classroomStudent;
    private StudentInterface $student;
    private AttendanceService $service;

    public function __construct(ModelHasRfidInterface $modelHasRfid, AttendanceInterface $attendance, StudentInterface $student, AttendanceRuleInterface $attendanceRule, ClassroomStudentInterface $classroomStudent, AttendanceService $service, RfidInterface $rfid)
    {
        $this->attendance = $attendance;
        $this->rfid = $rfid;
        $this->student = $student;
        $this->attendanceRule = $attendanceRule;
        $this->classroomStudent = $classroomStudent;
        $this->service = $service;
        $this->modelHasRfid = $modelHasRfid;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $present = $this->attendance->getSchool($school_id, 'checkin');
        // $out = $this->attendance->getSchool($school_id, 'checkout');
        return view('school.pages.test.list-attendance');
    }

    public function getStudents(Request $request)
    {
        $students = $this->classroomStudent->activeStudents();
        return $this->respondWithSuccess($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->attendances);
        $time = now();
        $day = strtolower($time->format('l'));
        $rule = $this->attendanceRule->showByDay($day, RoleEnum::STUDENT->value);

        if (!$rule) return ResponseHelper::jsonResponse('warning', 'Tidak ada jadwal absensi', null, 404);

        $data = $this->service->insert($request->attendances, $rule, $day);
        $this->attendance->insert($data);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
