<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentClassroomSheet implements FromView, WithTitle, ShouldAutoSize, WithEvents, WithStyles
{
    protected $classroom;

    public function __construct($classroom)
    {
        $this->classroom = $classroom;
    }

    public function view(): View
    {
        return view('school.export.students', [
            'classroom' => $this->classroom,
        ]);
    }

    public function title(): string
    {
        return $this->classroom->name;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                for ($cell=2; $cell < 1002 ; $cell++) {
                    $sheet->getStyle('D'.$cell)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
                    $dateValidation = $sheet->getCell('D'.$cell)->getDataValidation();
                    $dateValidation->setType(DataValidation::TYPE_DATE);
                    $dateValidation->setOperator(DataValidation::OPERATOR_BETWEEN);
                    $dateValidation->setFormula1('DATE(1900, 1, 1)');
                    $dateValidation->setFormula2('DATE(9999, 12, 31)');
                    $dateValidation->setAllowBlank(false);
                    $dateValidation->setShowDropDown(true);
                    $dateValidation->setErrorStyle(DataValidation::STYLE_STOP);
                    $dateValidation->setErrorTitle('Invalid input');
                    $dateValidation->setError('Only dates are allowed.');
                    $sheet->getCell('D'.$cell)->setDataValidation($dateValidation);

                    $genderValidation = $sheet->getCell('F'.$cell)->getDataValidation();
                    $genderOptions = 'Laki-laki,Perempuan';
                    $genderValidation->setType(DataValidation::TYPE_LIST);
                    $genderValidation->setFormula1('"' . $genderOptions . '"');
                    $genderValidation->setAllowBlank(false);
                    $genderValidation->setShowDropDown(true);
                    $sheet->getCell('F'.$cell)->setDataValidation($genderValidation);

                    $religionValidation = $sheet->getCell('M'.$cell)->getDataValidation();
                    $religionOptions = 'Kristen,Islam,Hindu,Budha,Katolik,Konghucu';
                    $religionValidation->setType(DataValidation::TYPE_LIST);
                    $religionValidation->setFormula1('"' . $religionOptions . '"');
                    $religionValidation->setAllowBlank(false);
                    $religionValidation->setShowDropDown(true);
                    $sheet->getCell('M'.$cell)->setDataValidation($religionValidation);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        foreach (range('A', 'M') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $row4Range = "A1:M1";
        $sheet->getStyle($row4Range)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => '2960FF'],
            ],
            'font' => [
                'color' => [
                    'rgb' => 'FFFFFF'
                ]
            ],
        ]);

        $row5Range = "A2:M2";
        $sheet->getStyle($row5Range)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'F73A08'],
            ],
            'font' => [
                'color' => [
                    'rgb' => 'FFFFFF'
                ]
            ],
        ]);
    }
}

