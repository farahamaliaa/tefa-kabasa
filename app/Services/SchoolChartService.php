<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Enums\AttendanceEnum;
use App\Models\Attendance;
use App\Models\Classroom;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchoolChartService
{
    private AttendanceInterface $attendance;
    private SchoolYearInterface $schoolYear;
    private ClassroomInterface $classroom;
    private StudentViolationInterface $studentViolation;

    public function __construct(AttendanceInterface $attendance, SchoolYearInterface $schoolYear, ClassroomInterface $classroom, StudentViolationInterface $studentViolation)
    {
        $this->attendance = $attendance;
        $this->schoolYear = $schoolYear;
        $this->classroom = $classroom;
        $this->studentViolation = $studentViolation;
    }

    public function ChartAttendance(AttendanceInterface $attendance)
    {
        $Curentyear = Carbon::now()->year;
        $Curentmonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for($month = 1; $month <= 12; $month++){
            $date = Carbon::createFromDate($Curentyear, $month, 1);
            $yearMonth = $date->isoFormat('MMMM');
            $attendance_present = $this->attendance->AttendanceChart($Curentyear, $month, AttendanceEnum::PRESENT->value);
            $attendance_permit = $this->attendance->AttendanceChart($Curentyear, $month, AttendanceEnum::PERMIT->value);
            $attendance_sick = $this->attendance->AttendanceChart($Curentyear, $month, AttendanceEnum::SICK->value);
            $attendance_alpha = $this->attendance->AttendanceChart($Curentyear, $month, AttendanceEnum::ALPHA->value);

            $grafikDataCollection[] = [
                'year' => $Curentyear,
                'month' => $yearMonth,
                'attendance_present' => $attendance_present,
                'attendance_permit' => $attendance_permit,
                'attendance_sick' => $attendance_sick,
                'attendance_alpha' => $attendance_alpha
            ];
        }
        $data  = array_values($grafikDataCollection);

        return $data;
    }

    public function ChartViolation(StudentViolationInterface $studentViolation)
    {
        $Curentyear = Carbon::now()->year;
        $Curentmonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for($month = 1; $month <= 12; $month++){
            $date = Carbon::createFromDate($Curentyear, $month, 1);
            $yearMonth = $date->isoFormat('MMMM');
            $violation = $this->studentViolation->ViolationChart($Curentyear, $month);

            $grafikDataCollection[] = [
                'year' => $Curentyear,
                'month' => $yearMonth,
                'violation' => $violation,
            ];
        }
        $data  = array_values($grafikDataCollection);

        return $data;
    }

    public function chartStudentAttendance($lates, $totalPermit, $alpha)
    {

        return [
            'chartLate' => $lates->count(),
            'chartSick' => $totalPermit,
            'chartAlpha' => $alpha->count()
        ];
    }

    public function ChartClassroomAttendance($date)
    {
        $attendances = $this->attendance->classroomAttendanceChart($date);

        // Mengambil nama kelas berdasarkan classroom_id yang ada dalam data kehadiran
        $classroomIds = $attendances->keys();
        $classrooms = $this->classroom->classroomAttendance($classroomIds);

        return [
            'attendances' => $attendances,
            'classrooms' => $classrooms
        ];
    }

    public function chartClass(Request $request)
    {
        $date = $request->input('date') ? $request->input('date', Carbon::today()->format('Y-m-d')) : today()->format('Y-m-d');
        $classrooms = $this->classroom->get();

        $result = [];
        foreach ($classrooms as $classroom) {
            $late = $this->attendance->whereClassroomCount($classroom->id, $date, AttendanceEnum::LATE);
            $notLate = $this->attendance->whereClassroomCount($classroom->id, $date, AttendanceEnum::PRESENT);
            $result[] = [
                'classroom' => $classroom->name,
                'data' => [
                    'present' => $late + $notLate,
                    'permit' => $this->attendance->whereClassroomCount($classroom->id, $date, AttendanceEnum::PERMIT),
                    'sick' => $this->attendance->whereClassroomCount($classroom->id, $date, AttendanceEnum::SICK),
                    'alpha' => $this->attendance->whereClassroomCount($classroom->id, $date, AttendanceEnum::ALPHA),
                ]
            ];
        }

        return $result;

    }
}
