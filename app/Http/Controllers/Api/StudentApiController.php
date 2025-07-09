<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\FeedbackInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Contracts\Repositories\AttendanceRepository;
use App\Enums\AttendanceEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\RepairStudentRequest;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Http\Resources\HistoryAttendanceResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\LessonScheduleResource;
use App\Http\Resources\SchoolPointResource;
use App\Http\Resources\StudentFeedbackResource;
use App\Http\Resources\StudentHistoryResource;
use App\Http\Resources\StudentRepairResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\StudentViolationResource;
use App\Http\Resources\SubjectResource;
use App\Models\Feedback;
use App\Models\LessonSchedule;
use App\Services\RepairStudentService;
use App\Models\StudentRepair;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\FeedbackService;
use Carbon\Carbon;

class StudentApiController extends Controller
{
    private ClassroomStudentInterface $classroomStudent;
    private StudentViolationInterface $studentViolation;
    private LessonScheduleInterface $lessonSchedule;
    private StudentRepairInterface $studentRepair;
    private SchoolPointInterface $schoolPoint;
    private FeedbackService $feedbackService;
    private AttendanceInterface $attendance;
    private RepairStudentService $service;
    private FeedbackInterface $feedback;
    private StudentInterface $student;
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;

    public function __construct(FeedbackService $feedbackService,
    LessonScheduleInterface $lessonSchedule, FeedbackInterface $feedback,
    RepairStudentService $service, StudentRepairInterface $studentRepair,
    SchoolPointInterface $schoolPoint, StudentViolationInterface $studentViolation,
    AttendanceInterface $attendance, StudentInterface $student,
    ClassroomStudentInterface $classroomStudent, ModelHasRfidInterface $modelHasRfid,
    AttendanceRuleInterface $attendanceRule,
    )
    {
        $this->classroomStudent = $classroomStudent;
        $this->studentViolation = $studentViolation;
        $this->feedbackService = $feedbackService;
        $this->attendanceRule = $attendanceRule;
        $this->lessonSchedule = $lessonSchedule;
        $this->studentRepair = $studentRepair;
        $this->modelHasRfid = $modelHasRfid;
        $this->schoolPoint = $schoolPoint;
        $this->attendance = $attendance;
        $this->feedback = $feedback;
        $this->student = $student;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $studentClasses = $this->classroomStudent->whereStudent($student->id);
        $lessonSchedule = $this->lessonSchedule->whereDayApi($studentClasses->classroom->id);
        $single_attendance = $this->attendance->userToday('App\Models\ClassroomStudent', $studentClasses->id);
        $rule_rfid = $this->modelHasRfid->first('App\Models\Student', $student->id);
        $rule_day = $this->attendanceRule->whereDayRole(today()->format('l'), 'student');

        if ($rule_rfid) {
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
                'school_year' => $studentClasses->classroom->schoolYear->school_year,
                'classroom' => [
                    'name' => $studentClasses->classroom->name,
                    'total_student' => $studentClasses->classroom->classroomStudents->count(),
                ],
                'homeroom_teacher' => [
                    'name' => $studentClasses->classroom->employee->user->name,
                    'email' => $studentClasses->classroom->employee->user->email,
                ],
                'attendance_now' => [
                    'day' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('l') : now()->translatedFormat('l'),
                    'date' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('d') : now()->translatedFormat('d'),
                    'month' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('M') : now()->translatedFormat('M'),
                    'date_complate' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('l, j F Y') : now()->translatedFormat('l, j F Y'),
                    'check_in' => $single_attendance ? ($single_attendance->checkin == null ? '-' : \Carbon\Carbon::parse($single_attendance->checkin)->format('H:i')) : '-',
                    'check_out' => $single_attendance ? ($single_attendance->checkout == null ? '-' : \Carbon\Carbon::parse($single_attendance->checkout)->format('H:i')) : '-',
                    'status' => $single_attendance ? $single_attendance->status->label() : '',
                ],
                'subject'=> SubjectResource::collection($lessonSchedule)->each(function ($resource) use ($student) {
                    $resource->setStudent($student);
                }),
            ]]);
        } else if ($rule_day->is_holiday ==  true) {
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
                'school_year' => $studentClasses->classroom->schoolYear->school_year,
                'classroom' => [
                    'name' => $studentClasses->classroom->name,
                    'total_student' => $studentClasses->classroom->classroomStudents->count(),
                ],
                'homeroom_teacher' => [
                    'name' => $studentClasses->classroom->employee->user->name,
                    'email' => $studentClasses->classroom->employee->user->email,
                ],
                'attendance_now' => [
                    'day' => now()->translatedFormat('l'),
                    'date' => now()->translatedFormat('d'),
                    'month' => now()->translatedFormat('M'),
                    'date_complate' => now()->translatedFormat('l, j F Y'),
                    'check_in' => '-',
                    'check_out' => '-',
                    'status' => 'Libur',
                ],
                'subject'=> SubjectResource::collection($lessonSchedule)->each(function ($resource) use ($student) {
                    $resource->setStudent($student);
                }),
            ]]);
        } else {
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
                'school_year' => $studentClasses->classroom->schoolYear->school_year,
                'classroom' => [
                    'name' => $studentClasses->classroom->name,
                    'total_student' => $studentClasses->classroom->classroomStudents->count(),
                ],
                'homeroom_teacher' => [
                    'name' => $studentClasses->classroom->employee->user->name,
                    'email' => $studentClasses->classroom->employee->user->email,
                ],
                'message_attendance' => "Anda belum memiliku RFID",
                'subject'=> SubjectResource::collection($lessonSchedule)->each(function ($resource) use ($student) {
                    $resource->setStudent($student);
                }),
            ]]);
        }

    }

    public function history_attendance(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $studentClasses = $this->classroomStudent->whereStudent($student->id);
        $history_attendance = $this->attendance->whereUser($studentClasses->id, 'App\Models\ClassroomStudent');

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'attendance_history' => HistoryAttendanceResource::collection($history_attendance),
        ]]);
    }

    public function lessonSchedule(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $studentClasses = $this->classroomStudent->whereStudent($student->id);
        $lessonSchedule = $this->lessonSchedule->whereClassroom($studentClasses->classroom->id, 'day');

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'Senin' => LessonResource::collection(isset($lessonSchedule['monday']) ? $lessonSchedule['monday'] : [])->each(function ($resource) use ($student) {
                $resource->setStudent($student);
            }),
            'Selasa' => LessonResource::collection(isset($lessonSchedule['tuesday']) ? $lessonSchedule['tuesday'] : [])->each(function ($resource) use ($student) {
                $resource->setStudent($student);
            }),
            'Rabu' => LessonResource::collection(isset($lessonSchedule['wednesday']) ? $lessonSchedule['wednesday'] : [])->each(function ($resource) use ($student) {
                $resource->setStudent($student);
            }),
            'Kamis' => LessonResource::collection(isset($lessonSchedule['thursday']) ? $lessonSchedule['thursday'] : [])->each(function ($resource) use ($student) {
                $resource->setStudent($student);
            }),
            'Jumat' => LessonResource::collection(isset($lessonSchedule['friday']) ? $lessonSchedule['friday'] : [])->each(function ($resource) use ($student) {
                $resource->setStudent($student);
            }),
            'Sabtu' => LessonResource::collection(isset($lessonSchedule['saturday']) ? $lessonSchedule['saturday'] : [])->each(function ($resource) use ($student) {
                $resource->setStudent($student);
            }),
        ]]);
    }

    public function violation(User $user, Request $request)
    {
        $student = $this->student->whereUserId($user->id);
        $studentViolations = $this->studentViolation->whereStudent($student->id, $request);

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'violations' => StudentViolationResource::collection($studentViolations),
        ]]);
    }

    public function repair(User $user, Request $request)
    {
        $student = $this->student->whereUserId($user->id);
        $repairs = $this->studentRepair->whereStudent($student->id, $request);

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'repair' => StudentRepairResource::collection($repairs),
        ]]);
    }

    public function class_student(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $studentClasses = $this->classroomStudent->whereStudent($student->id);

        return response()->json(['name_class' => $studentClasses->classroom->name, 'status' => 'success', 'message' => "Berhasil mengirim bukti perbaikan",'code' => 200, 'data' =>
            StudentResource::collection($studentClasses->classroom->classroomStudents),
        ]);
    }

    public function point_student(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengirim bukti perbaikan",'code' => 200, 'point' => $student->point]);
    }

    public function get_detail_profile(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $repairs = $this->studentRepair->count_repair($student->id);
        $violations = $this->studentViolation->count_violation($student->id);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengirim bukti perbaikan",'code' => 200, 'data' => [
            'repair' => $repairs,
            'violation' => $violations,
        ]]);
    }
}
