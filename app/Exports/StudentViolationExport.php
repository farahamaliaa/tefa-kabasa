<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Regulation;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation as DataValidationType;

class StudentViolationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $siswaList = Student::with('user')->get()->pluck('user.name')->toArray();
        $pelanggaranList = Regulation::pluck('violation')->toArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nama Siswa');
        $sheet->setCellValue('B1', 'Jenis Pelanggaran');

        $sheet->setCellValue('A2', 'Contoh Format (Jangan di Hapus)');
        $sheet->setCellValue('B2', 'Tidak memakai dasi');

        // Lebarkan kolom sesuai dengan isinya
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);

        // Style untuk header
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['argb' => Color::COLOR_WHITE],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => Color::COLOR_DARKBLUE,
                ],
            ],
        ];
        
        $exampleStyle = [
            'font' => [
                'color' => ['argb' => Color::COLOR_WHITE],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => Color::COLOR_RED,
                ],
            ],
        ];

        // Terapkan style ke A1 dan B1
        $sheet->getStyle('A1:B1')->applyFromArray($headerStyle);
        $sheet->getStyle('A2:B2')->applyFromArray($exampleStyle);

        // Set tingginya agar lebih jelas
        $sheet->getRowDimension(1)->setRowHeight(20);

        $dropdownCellA = 'A3:A1000';
        $validationA = $sheet->getCell('A3')->getDataValidation();
        $validationA->setType(DataValidationType::TYPE_LIST);
        $validationA->setErrorStyle(DataValidationType::STYLE_INFORMATION);
        $validationA->setAllowBlank(false);
        $validationA->setShowInputMessage(true);
        $validationA->setShowErrorMessage(true);
        $validationA->setShowDropDown(true);
        $validationA->setFormula1('"' . implode(',', $siswaList) . '"');

        foreach (range(2, 100) as $row) {
            $sheet->getCell("A$row")->setDataValidation(clone $validationA);
        }

        $dropdownCellB = 'B3:B1000';
        $validationB = $sheet->getCell('B3')->getDataValidation();
        $validationB->setType(DataValidationType::TYPE_LIST);
        $validationB->setErrorStyle(DataValidationType::STYLE_INFORMATION);
        $validationB->setAllowBlank(false);
        $validationB->setShowInputMessage(true);
        $validationB->setShowErrorMessage(true);
        $validationB->setShowDropDown(true);
        $validationB->setFormula1('"' . implode(',', $pelanggaranList) . '"');

        foreach (range(2, 100) as $row) {
            $sheet->getCell("B$row")->setDataValidation(clone $validationB);
        }

        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/siswa-pelanggaran.xlsx');
        $writer->save($filePath);
    }
}
