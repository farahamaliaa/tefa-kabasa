<?php

namespace App\Exports;

use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class StudentClassroomExport implements WithMultipleSheets
{
    protected $schoolYearId;

    public function __construct(mixed $schoolYearId)
    {
        $this->schoolYearId = $schoolYearId;
    }

    /**
     * Menghasilkan array sheets, setiap sheet untuk satu kelas.
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $classrooms = Classroom::where('school_year_id', $this->schoolYearId)->get();

        foreach ($classrooms as $classroom) {
            $sheets[] = new StudentClassroomSheet($classroom);
        }

        return $sheets;
    }
}
