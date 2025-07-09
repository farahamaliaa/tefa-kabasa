<?php

namespace App\Exports;

use App\Models\Classroom;
use App\Models\Employee;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Excel;

class StudentClassroom2Export implements WithEvents
{
    private $schoolYearId;

    public function __construct($schoolYearId)
    {
        $this->schoolYearId = $schoolYearId;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $filePath = public_path('file/new-class-format-import-student.xlsx');

                $teachers = Employee::with('user')->get()->pluck('user.name')->toArray();
                $list = implode(',', $teachers);

                $spreadsheet = IOFactory::load($filePath);
                $sheet = $spreadsheet->getSheet(0);

                $classrooms = Classroom::where('school_year_id', $this->schoolYearId)->get()->pluck('name')->toArray();

                foreach ($classrooms as $data => $value) {
                    $newSheet = clone $sheet;
                    $newSheet->setTitle($value);
                    $spreadsheet->addSheet($newSheet);

                    $validation = new DataValidation();
                    $validation->setType(DataValidation::TYPE_LIST);
                    $validation->setFormula1('"' . $list . '"');
                    $validation->setAllowBlank(false);
                    $validation->setShowDropDown(true);

                    $newSheet->getCell('B2')->setDataValidation($validation);
                }

                $writer = new Xlsx($spreadsheet);
                $writer->save($filePath);
            }
        ];
    }
}
