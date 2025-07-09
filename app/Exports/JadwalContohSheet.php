<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\LessonHour;
use App\Enums\DayEnum;

class JadwalContohSheet implements WithHeadings, WithTitle, WithEvents
{
    private $school_year;

    public function __construct($school_year)
    {
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
        return 'Contoh Format';
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
                $sheet->setCellValue('B1', 'Nama Kelas');
                $sheet->mergeCells('A1:A2');

                //Contoh Hari Senin
                $sheet->mergeCells('B3:B5');
                $sheet->setCellValue('B3', 'Matematika');
                $sheet->mergeCells('B6:B9');
                $sheet->setCellValue('B6', 'Bahasa Indonesia');
                $sheet->mergeCells('B10:B13');
                $sheet->setCellValue('B10', 'IPA');

                //Contoh Hari Selasa
                $sheet->mergeCells('C3:C7');
                $sheet->setCellValue('C3', 'Informatika');
                $sheet->mergeCells('C8:C10');
                $sheet->setCellValue('C8', 'Olahraga');
                $sheet->mergeCells('C11:C14');
                $sheet->setCellValue('C11', 'IPS');

                //Contoh Hari Rabu
                $sheet->mergeCells('D3:D8');
                $sheet->setCellValue('D3', 'Bahasa Inggris');
                $sheet->mergeCells('D9:D12');
                $sheet->setCellValue('D9', 'Sejarah');
                $sheet->mergeCells('D13:D16');
                $sheet->setCellValue('D13', 'Produktif');

                //Contoh Hari Kamis
                $sheet->mergeCells('E3:E5');
                $sheet->setCellValue('E3', 'Bahasa Jawa');
                $sheet->mergeCells('E6:E9');
                $sheet->setCellValue('E6', 'Matematika');
                $sheet->mergeCells('E10:E13');
                $sheet->setCellValue('E10', 'PKN');

                $sheet->mergeCells('I5:J5');
                $sheet->setCellValue('I5', 'Jangan Di Ubah / Hapus');

                $sheet->getStyle('I5:J5')->applyFromArray([
                    'font' => [
                        'color' => ['rgb' => '000000'],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'FF0000'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                //Contoh Hari Jumat
                $sheet->mergeCells('F3:F7');
                $sheet->setCellValue('F3', 'Agama');

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
            }
        ];
    }
}
