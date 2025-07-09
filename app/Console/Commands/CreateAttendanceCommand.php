<?php

namespace App\Console\Commands;

use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\LessonHour;
use App\Enums\AttendanceEnum;
use App\Models\AttendanceRule;
use Illuminate\Console\Command;
use App\Models\ClassroomStudent;

class CreateAttendanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:create-attendance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $day = strtolower(now()->format('l'));
        $date = date('Y-m-d');
        // info($date);
        // info(Attendance::whereDate('created_at', $date)->where('model_type', 'App\Models\ClassroomStudent')->first());
        // return;
        if (!Attendance::whereDate('created_at', $date)->where('model_type', 'App\Models\ClassroomStudent')->first()) {
            $classroomStudents = ClassroomStudent::with(['classroom.lessonSchedule' => function ($query) use ($day) {
                $query->where('day', $day);
            }])
                ->whereRelation('classroom.schoolYear', function ($query) {
                    $query->where('active', 1);
                })->whereHas('student.modelHasRfid')->get();

            $attendanceStudent = $classroomStudents->map(function ($student) use ($day) {
                return [
                    'point' => 13,
                    'model_type' => "App\Models\ClassroomStudent",
                    'model_id' => $student->id,
                    'created_at' => now(),
                    'status' => AttendanceEnum::ALPHA->value
                ];
            })->toArray();
        }

        if (!Attendance::whereDate('created_at', $date)->where('model_type', 'App\Models\Employee')->first()) {
            $teachers = Employee::whereHas('modelHasRfid')
                ->where('status', RoleEnum::TEACHER->value)
                ->get();

            $attendanceTeacher = $teachers->map(function ($teacher) {
                return [
                    'point' => 13,
                    'model_type' => "App\Models\Employee",
                    'model_id' => $teacher->id,
                    'created_at' => now(),
                    'status' => AttendanceEnum::ALPHA->value
                ];
            })->toArray();
        }
        // $stored = $classroomStudents->attendance()->insert(['status' => 'alpha']);
        $attendanceData = array_merge($attendanceTeacher ?? [], $attendanceStudent ?? []);

        info($attendanceData);
        Attendance::insert($attendanceData);
    }
}
