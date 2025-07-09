<?php

namespace App\Exports;

use App\Enums\DayEnum;
use App\Models\LessonHour;
use App\Models\TeacherSubject;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class JadwalPelajaranSheet implements WithHeadings, WithTitle, WithEvents
{
    private $classroom;
    private $school_year;

    public function __construct($classroom, $school_year)
    {
        $this->classroom = $classroom;
        $this->school_year = $school_year;
    }

    public function headings(): array
    {
        return [
            'Jam Ke',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
        ];
    }

    public function title(): string
    {
        return $this->classroom->name;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $jam = LessonHour::where('day', DayEnum::MONDAY->value)->get();
                $sheet = $event->sheet->getDelegate();

                $sheet->mergeCells('B1:G1');

                $sheet->setCellValue("I2", $this->school_year);
                $sheet->getStyle('B1')->getAlignment()->setHorizontal('center')->setVertical('center');
                $sheet->setCellValue('B1', $this->classroom->name);

                $sheet->mergeCells('A1:A2');

                $sheet->setCellValue('A1', 'Jam Ke');
                $sheet->setCellValue('B2', "Senin");
                $sheet->setCellValue('C2', "Selasa");
                $sheet->setCellValue('D2', "Rabu");
                $sheet->setCellValue('E2', "Kamis");
                $sheet->setCellValue('F2', "Jumat");
                $sheet->setCellValue('G2', "Sabtu");
                $sheet->setCellValue('I1', "Tahun Ajaran");

                // Mengatur lebar kolom
                $columns = ['B', 'C', 'D', 'E', 'F', 'G'];
                foreach ($columns as $column) {
                    $sheet->getColumnDimension($column)->setWidth(20);
                }

                // Terapkan pembungkusan teks pada semua kolom (A hingga G)
                $sheet->getStyle('A1:G50')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'wrapText' => true, // Mengaktifkan pembungkusan teks
                    ],
                ]);

                // Menambahkan data jam ke dalam kolom A
                $row = 3;
                foreach ($jam as $item) {
                    $sheet->setCellValue("A$row", $item->name != 'Istirahat' ? explode(' - ', $item->name)[1] : $item->name);
                    $row++;
                }

                // Data untuk dropdown Mapel
                $mapelOptions = TeacherSubject::with(['employee.user', 'subject'])->get();
                $mapelOptionsArray = $mapelOptions->map(fn($item) => "{$item->subject->name} - {$item->employee->user->name}")->toArray();

                // $mapelDropdown = implode(',', $mapelOptionsArray);
                $rowIndex = 1; // Mulai dari baris pertama di kolom Z
                foreach ($mapelOptionsArray as $option) {
                    $sheet->setCellValue("Z{$rowIndex}", $option);
                    $rowIndex++;
                }

                $dropdownRange = '=$Z$1:$Z$' . ($rowIndex - 1);

                // Set data validation untuk kolom B sampai G pada rentang baris 3 sampai 100
                for ($row = 3; $row <= $jam->count() + 2; $row++) {
                    foreach ($columns as $column) {
                        $validation = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
                        $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                        $validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
                        $validation->setAllowBlank(false);
                        $validation->setShowInputMessage(true);
                        $validation->setShowErrorMessage(true);
                        $validation->setShowDropDown(true);
                        // $validation->setFormula1(sprintf('"%s"', $mapelDropdown));
                        $validation->setFormula1($dropdownRange);
                        $sheet->getCell("$column{$row}")->setDataValidation($validation);
                    }
                }
            }
        ];
    }
}
