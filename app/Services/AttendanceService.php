<?php

namespace App\Services;

use Carbon\Carbon;
use App\Enums\RoleEnum;
use App\Models\Student;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Enums\AttendanceEnum;
use function PHPSTORM_META\map;
use App\Http\Requests\StoreAttendanceRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\AttendanceTeacherInterface;
use App\Contracts\Interfaces\MaxLateInterface;
use App\Enums\StatusEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\AttendanceLicensesRequest;
use App\Models\Attendance;
use App\Models\ClassroomStudent;
use App\Models\ModelHasRfid;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;

class AttendanceService
{
    use UploadTrait;

    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;
    private StudentInterface $student;
    private AttendanceInterface $attendance;
    private AttendanceTeacherInterface $attendanceTeacher;
    private MaxLateInterface $max_late;

    public function __construct(ModelHasRfidInterface $modelHasRfid, StudentInterface $student, AttendanceRuleInterface $attendanceRule, AttendanceInterface $attendance, AttendanceTeacherInterface $attendanceTeacher, MaxLateInterface $max_late)
    {
        $this->modelHasRfid = $modelHasRfid;
        $this->student = $student;
        $this->attendance = $attendance;
        $this->attendanceRule = $attendanceRule;
        $this->attendanceTeacher = $attendanceTeacher;
        $this->max_late = $max_late;
    }

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function store(StoreAttendanceRequest $request): array|bool
    {
        $data = $request->validated();
        return $data;
    }
    public function insert($request, $rule, $date): mixed
    {
        $attendances = collect($request->attendances);

        $students = [];
        $teachers = [];
        $invalidAttendances = [];

        $max_late = $this->max_late->get();
        $rfids = ModelHasRfid::whereIn('id', $attendances->pluck('id')->toArray())->get();
        // dd($attendances->pluck('id')->toArray());
        // dd(ModelHasRfid::whereIn('id', $attendances->pluck('id')->toArray())->toSql(), ModelHasRfid::whereIn('id', $attendances->pluck('id')->toArray())->get());

        // dd($rfids, $attendances->pluck('id')->toArray(), $request);
        // teacher attendance

        $attendanceData = $attendances->map(function ($attendance) use ($rfids, $rule, $date, $max_late) {

            // Extract rules for students and teachers
            $studentRule = $rule['student'][0];
            $teacherRule = $rule['teacher'][0];

            $time = Carbon::createFromFormat('H:i:s', $attendance->time);
            $rfid = $rfids->where('id', $attendance->id)->first();

            if ($rfid) {
                if ($attendance->type == RoleEnum::STUDENT->value) {
                    // Student rules
                    $checkinEnd = Carbon::create($studentRule->checkin_end);
                    $checkoutStart = Carbon::create($studentRule->checkout_start);
                    $checkoutEnd = Carbon::create($studentRule->checkout_end);
                    $startLate = $checkinEnd->copy()->subMinutes($max_late == null ? 0 :$max_late->max_late);

                    if ($time->greaterThan($startLate) && $time->lessThanOrEqualTo($checkinEnd)) {
                        return [
                            'model_id' => $rfid->model->classroomStudents->first()->id,
                            'model_type' => "App\Models\ClassroomStudent",
                            'status' => AttendanceEnum::LATE->value,
                            'checkin' => $time->toDateTimeString(),
                            'created_at' => $date
                        ];
                    } elseif ($time->greaterThan($checkinEnd) && $time->lessThanOrEqualTo($checkoutStart)) {
                        return [
                            'model_id' => $rfid->model->classroomStudents->first()->id,
                            'model_type' => "App\Models\ClassroomStudent",
                            'status' => AttendanceEnum::ALPHA->value,
                            'checkin' => $time->toDateTimeString(),
                            'created_at' => $date
                        ];
                    } elseif ($time->greaterThan($checkoutStart)) {
                        return [
                            'model_id' => $rfid->model->classroomStudents->first()->id,
                            'model_type' => "App\Models\ClassroomStudent",
                            'checkout' => $time->toDateTimeString(),
                            'created_at' => $date
                        ];
                    } else {
                        return [
                            'model_id' => $rfid->model->classroomStudents->first()->id,
                            'model_type' => "App\Models\ClassroomStudent",
                            'status' => AttendanceEnum::PRESENT->value,
                            'checkin' => $time->toDateTimeString(),
                            'created_at' => $date
                        ];
                    }
                } else {
                    // Teacher rules
                    $checkinEnd = Carbon::create($teacherRule->checkin_end);
                    $checkoutStart = Carbon::create($teacherRule->checkout_start);
                    $checkoutEnd = Carbon::create($teacherRule->checkout_end);
                    $startLate = $checkinEnd->copy()->subMinutes($max_late == null ? 0 :$max_late->max_late);

                    if ($time->greaterThanOrEqualTo($startLate) && $time->lessThanOrEqualTo($checkinEnd)) {
                        return [
                            'model_id' => $rfid->model_id,
                            'model_type' => "App\Models\Employee",
                            'status' => AttendanceEnum::LATE->value,
                            'checkin' => $time->toDateTimeString(),
                            'created_at' => $date
                        ];
                    } elseif ($time->greaterThan($checkinEnd) && $time->lessThan($checkoutStart)) {
                        return [
                            'model_id' => $rfid->model_id,
                            'model_type' => "App\Models\Employee",
                            'status' => AttendanceEnum::ALPHA->value,
                            'checkin' => $time->toDateTimeString(),
                            'created_at' => $date
                        ];
                    } elseif ($time->greaterThan($checkoutStart)) {
                        return [
                            'model_id' => $rfid->model_id,
                            'model_type' => "App\Models\Employee",
                            'checkout' => $time->toDateTimeString(),
                            'created_at' => $date
                        ];
                    } else {
                        return [
                            'model_id' => $rfid->model_id,
                            'model_type' => "App\Models\Employee",
                            'status' => AttendanceEnum::PRESENT->value,
                            'checkin' => $time->toDateTimeString(),
                            'created_at' => $date
                        ];
                    }
                }
            } else {
                $invalidAttendances[] = $attendance->id;
                // dd($rfid);
                return [
                    'model_id' => $rfid->model_id ?? null,
                    'invalid' => true
                ];
            }
        });

        return $attendanceData;

        // // Collect attendance IDs
        // $attendanceIds = collect($attendances)->pluck('id');
        // $invalidAttendances = [];

        // // Get current day's attendance
        // $currentDayAttendanceStudent = $this->attendance->getCurrentDay();
        // $currentDayAttendanceTeacher = $this->attendance->getCurrentDay();

        // // Get student attendance based on RFID
        // $studentAttendance = Student::with('modelHasRfid')->whereHas('modelHasRfid', function ($q) use ($attendanceIds) {
        //     $q->whereIn('id', $attendanceIds);
        // })->get()->pluck('id', 'modelHasRfid.id');

        // // Student::whereIn('id',[1,2,3])->whereDate('crea','')->update([]);


        // // Get teacher attendance based on RFID
        // $teacherAttendance = Employee::with('modelHasRfid')->where('status', RoleEnum::TEACHER->value)->whereHas('modelHasRfid', function ($q) use ($attendanceIds) {
        //     $q->whereIn('id', $attendanceIds);
        // })->get()->pluck('id', 'modelHasRfid.id');

        // $students = [];
        // $teachers = [];

        // foreach ($attendances as $attendance) {
        //     $time = Carbon::createFromFormat('H.i', $attendance['time']);
        //     $checkinStart = Carbon::parse($rule->checkin_start);
        //     $checkinEnd = Carbon::parse($rule->checkin_end);
        //     $checkoutStart = Carbon::parse($rule->checkout_start);
        //     $checkoutEnd = Carbon::parse($rule->checkout_end);

        //     // Checkout
        //     if ($time->between($checkoutStart, $checkoutEnd)) {
        //         // Check if already checked in
        //         $checkinStudent = $currentDayAttendanceStudent->where('classroom_student_id', $attendance['id'])->where('checkin', '<', $checkoutStart);
        //         $checkinTeacher = $currentDayAttendanceTeacher->where('checkin', '<', $checkoutStart);
        //         $alreadyAbsentStudent = $currentDayAttendanceStudent->whereNotNull('checkout');
        //         $alreadyAbsentTeacher = $currentDayAttendanceTeacher->whereNotNull('checkout');


        //         if (!$alreadyAbsentStudent->isEmpty() || !$alreadyAbsentTeacher->isEmpty()) {
        //             array_push($invalidAttendances, ['id' => $attendance['id']]);
        //             continue;
        //         }

        //         $status = $time->greaterThanOrEqualTo($checkoutStart) && $checkinStudent->isEmpty() && $checkinTeacher->isEmpty() ? AttendanceEnum::ALPHA : AttendanceEnum::PRESENT;

        //         $value = [
        //             'checkout' => $time,
        //             'status' => $status,
        //         ];

        //         if (isset($studentAttendance[$attendance['id']])) {
        //             $value['classroom_student_id'] = $studentAttendance[$attendance['id']];
        //             array_push($students, $value);
        //         } else {
        //             $value['employee_id'] = $teacherAttendance[$attendance['id']];
        //             array_push($teachers, $value);
        //         }
        //     }
        //     // Checkin
        //     else if ($time->greaterThanOrEqualTo($checkinStart)) {
        //         $alreadyAbsentStudent = $currentDayAttendanceStudent->whereNull('checkout');
        //         $alreadyAbsentTeacher = $currentDayAttendanceTeacher->whereNull('checkout');


        //         if (!$alreadyAbsentStudent->isEmpty() || !$alreadyAbsentTeacher->isEmpty()) {
        //             array_push($invalidAttendances, ['id' => $attendance['id']]);
        //             continue;
        //         };

        //         $status = $time->greaterThan($checkinEnd) ? AttendanceEnum::LATE : AttendanceEnum::PRESENT;

        //         $value = [
        //             'checkin' => $time,
        //             'status' => $status,
        //         ];

        //         // dd(isset($studentAttendance[$attendance['id']]));
        //         // dd($attendance['id'], $studentAttendance->toArray(), in_array($attendance['id'], $studentAttendance->toArray()));

        //         if (isset($studentAttendance[$attendance['id']])) {
        //             $value['classroom_student_id'] = $studentAttendance[$attendance['id']];
        //             array_push($students, $value);
        //         } else {
        //             $value['employee_id'] = $teacherAttendance[$attendance['id']];
        //             array_push($teachers, $value);
        //         }
        //     }
        // }

        // return ['students' => $students, 'teachers' => $teachers, 'invalid' => $invalidAttendances];
    }

    public function storeByStudent($time, $classroom_student_id, $status): array|bool
    {
        $data = ([
            'classroom_student_id' => $classroom_student_id,
            'point' => '10',
            'status' => $status,
            'checkin' => $time,
        ]);

        return $data;
    }

    public function storeByTeacher($time, $employee_id, $status): array|bool
    {
        $data = ([
            'employee_id' => $employee_id,
            'status' => $status,
            'checkin' => $time,
        ]);

        return $data;
    }


    public function syncStudentAttendacne($presentCollection, $outCollection)
    {
        $present = $presentCollection->map(function ($item) {
            return [
                'name' => $item->classroomStudent->student->user->name,
                'school' => $item->classroomStudent->classroom->schoolYear->school->user->name,
                'checkin' => $item->checkin,
                'checkout' => $item->checkout,
            ];
        })->toArray();

        $out = $outCollection->map(function ($item) {
            return [
                'name' => $item->classroomStudent->student->user->name,
                'school' => $item->classroomStudent->classroom->schoolYear->school->user->name,
                'checkin' => $item->checkin,
                'checkout' => $item->checkout,
            ];
        })->toArray();

        return $data = compact('present', 'out');
    }

    public function upload_proof(Attendance $attendance, Request $request)
    {
        $data = $request->validate([
            'proof' => 'required|file|mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);

        if ($request->hasFile('proof') && $request->file('proof')->isValid()) {
            $data['proof'] = $request->file('proof')->store(UploadDiskEnum::PROOF->value, 'public');
        } elseif ($request->hasFile('proof') && $request->file('proof')->isValid() && $attendance->proof != null) {
            $this->remove($attendance->proof);
            $data['proof'] = $request->file('proof')->store(UploadDiskEnum::PROOF->value, 'public');
        } else {
            $data['proof'] = $attendance->proof;
        }

        return [
            'proof' => $data['proof'],
            'status' => $data['status'] == 1 ? AttendanceEnum::PERMIT->value : AttendanceEnum::SICK->value,
            'point' => $data['status'] == 1 ? '12' : '11',
        ];
    }

    public function proof(AttendanceLicensesRequest $request): void
    {
        $data = $request->validated();

        if ($request->hasFile('proof') && $request->file('proof')->isValid()) {
            $data['proof'] = $request->file('proof')->store(UploadDiskEnum::PROOF->value, 'public');
        }

        $startDate = Carbon::parse($data['start_date']);
        $endDate = Carbon::parse($data['end_date']);

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            DB::table('attendances')->insert([
                'model_type' => 'App\Models\ClassroomStudent',
                'model_id' => $data['classroomStudent'],
                'point' => $data['status'] == '1' ? '12' : '11',
                'status' => $data['status'] == '1' ? AttendanceEnum::PERMIT : AttendanceEnum::SICK,
                'proof' => $data['proof'],
                'created_at' => $date->toDateString(),
            ]);
        }
    }
}
