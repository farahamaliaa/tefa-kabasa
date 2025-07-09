<?php

namespace App\Exports;

use App\Models\Student;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation as DataValidationType;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class StudentRepairExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $siswaList = Student::with('user')->get()->pluck('user.name')->toArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nama siswa');
        $sheet->setCellValue('B1', 'Perbaikan');
        $sheet->setCellValue('C1', 'Jumlah point dikurangi');
        $sheet->setCellValue('D1', 'Tanggal dimulai');
        $sheet->setCellValue('E1', 'Tanggal berakhir');

        $sheet->setCellValue('A2', 'Contoh Format (Jangan di Hapus)');
        $sheet->setCellValue('B2', 'Keliling Lapangan');
        $sheet->setCellValue('C2', '20');
        $sheet->setCellValue('D2', 'bulan/hari/tahun ( 01/18/2024 )');
        $sheet->setCellValue('E2', 'bulan/hari/tahun ( 01/18/2024 )');

        // Lebarkan kolom sesuai dengan isinya
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);

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
        $sheet->getStyle('A1:E1')->applyFromArray($headerStyle);
        $sheet->getStyle('A2:E2')->applyFromArray($exampleStyle);

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

        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/siswa-perbaikan.xlsx');
        $writer->save($filePath);
    }
}
