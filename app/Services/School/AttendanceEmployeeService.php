<?php

namespace App\Services\School;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Enums\AttendanceEnum;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceEmployeeService
{
    private AttendanceInterface $attendance;

    public function __construct(AttendanceInterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function ChartAttendanceEmployee(AttendanceInterface $attendance, Request $request)
    {
        $StartRequestday = Carbon::parse($request->start_date)->format('Y-m-d'). ' 00:00:00';
        $EndRequestday = Carbon::parse($request->end_date)->format('Y-m-d'). ' 23:59:59';

        $StartCurentdate = Carbon::today();
        $EndCurentdate = Carbon::tomorrow();

        $grafikDataCollection = [];

        $attendance_present = $this->attendance->AttendanceChartEmployee($StartRequestday ? $StartRequestday : $StartCurentdate, $EndRequestday ? $EndRequestday : $EndCurentdate, AttendanceEnum::PRESENT->value);
        $attendance_permit = $this->attendance->AttendanceChartEmployee($StartRequestday ? $StartRequestday : $StartCurentdate, $EndRequestday ? $EndRequestday : $EndCurentdate, AttendanceEnum::PERMIT->value);
        $attendance_sick = $this->attendance->AttendanceChartEmployee($StartRequestday ? $StartRequestday : $StartCurentdate, $EndRequestday ? $EndRequestday : $EndCurentdate, AttendanceEnum::SICK->value);
        $attendance_alpha = $this->attendance->AttendanceChartEmployee($StartRequestday ? $StartRequestday : $StartCurentdate, $EndRequestday ? $EndRequestday : $EndCurentdate, AttendanceEnum::ALPHA->value);

        $grafikDataCollection[] = [
            'attendance_present' => $attendance_present,
            'attendance_permit' => $attendance_permit,
            'attendance_sick' => $attendance_sick,
            'attendance_alpha' => $attendance_alpha
        ];

        $data  = array_values($grafikDataCollection);

        return $data;
    }
}
