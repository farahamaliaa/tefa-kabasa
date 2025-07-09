<?php

namespace App\Console\Commands;

use App\Enums\RoleEnum;
use App\Models\Attendance;
use App\Models\AttendanceRule;
use Illuminate\Console\Command;

class DeleteAttendanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:delete-attendance';

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
        if (AttendanceRule::where('day', $day)->where('role', RoleEnum::STUDENT->value)->first()->is_holiday) {
            Attendance::where('model_type', 'App\Models\ClassroomStudent')
                ->whereDay('created_at', now()->day)->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)
                ->delete();
        }

        if (AttendanceRule::where('day', $day)->where('role', RoleEnum::TEACHER->value)->first()->is_holiday) {
            Attendance::where('model_type', 'App\Models\Employee')
                ->whereDay('created_at', now()->day)->whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)
                ->delete();
        }
    }
}
