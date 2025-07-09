<?php

namespace App\Services;

use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use Carbon\Carbon;

class StaffChartService
{

    private StudentViolationInterface $studentViolation;
    private StudentRepairInterface $studentRepair;

    public function __construct(StudentViolationInterface $studentViolation, StudentRepairInterface $studentRepair)
    {
        $this->studentViolation = $studentViolation;
        $this->studentRepair = $studentRepair;
    }

    public function violationChart()
    {
        $Curentyear = Carbon::now()->year;
        $Curentmonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for($month = 1; $month <= 12; $month++){
            $date = Carbon::createFromDate($Curentyear, $month, 1);
            $yearMonth = $date->isoFormat('MMMM');
            $violation = $this->studentViolation->ViolationChart($Curentyear, $month);
            $repair = $this->studentRepair->repairChart($Curentyear, $month);

            $grafikDataCollection[] = [
                'year' => $Curentyear,
                'month' => $yearMonth,
                'violation' => $violation,
                'repair' => $repair
            ];
        }
        $data  = array_values($grafikDataCollection);

        return $data;
    }
}
