<?php

namespace App\Exports;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Models\Classroom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ClassroomAttendanceSheet extends StudentAttendanceExport implements FromCollection, WithTitle, ShouldAutoSize, WithStyles
{
    private $classroomStudents;

    public function __construct($classroomStudents, Classroom $classroom, Request $request, AttendanceInterface $attendance) {
        $this->classroomStudents = $classroomStudents;
        $this->classroom = $classroom;
        $this->attendance = $attendance;
        $this->request = $request;


    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $startDate = Carbon::parse($this->request->start)->translatedFormat('d F Y');
        $endDate   = Carbon::parse($this->request->end)->translatedFormat('d F Y');

        $data = collect([
            [''],
            ['DAFTAR HADIR SISWA'],
            ['SMKS BABUSSALAM'],
            ["Rentang Tanggal {$startDate} - {$endDate}"],
            [
                'Nama Kelas: ' . $this->classroom->name .
                ' - Wali Kelas: ' . ($this->classroom->employee->user->name ?? 'Tidak ada wali kelas')
            ],
            [''],
            ['NOMOR', '', 'NAMA', 'Jumlah'],
            ['URUT', 'NISN', '', 'Hadir', 'Sakit', 'Izin', 'Alpha'],
        ]);

        $no = 1;

        foreach ($this->classroomStudents as $classroomStudent) {
            $attendances = $this->attendance
                ->countAttendanceByClassroomStudentWithRange($classroomStudent, $this->request);

            // Pastikan 0 selalu ditampilkan (pakai string agar Excel nggak kosong)
            $data->push([
                $no++,
                $classroomStudent->student->nisn,
                strtoupper($classroomStudent->student->user->name),
                (string)($attendances['present'] ?? '0'),
                (string)($attendances['sick'] ?? '0'),
                (string)($attendances['permit'] ?? '0'),
                (string)($attendances['alpha'] ?? '0'),
            ]);
        }

        return $data;
    }

    public function title(): string
    {
        return 'Rekap Keseluruhan';
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();

        // Global font untuk seluruh sheet
        $sheet->getParent()
            ->getDefaultStyle()
            ->getFont()
            ->setName('Times New Roman')
            ->setSize(12);

        // Merge cells
        $mergeCells = [
            'A2:G2', 'A3:G3', 'A4:G4', 'A5:G5',
            'A7:B7', 'C7:C8', 'D7:G7'
        ];

        foreach ($mergeCells as $range) {
            $sheet->mergeCells($range);
        }

        // Helper untuk style header
        $applyHeaderStyle = function (string $range, int $fontSize, bool $bold = true) use ($sheet) {
            $sheet->getStyle($range)->applyFromArray([
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'font' => [
                    'size' => $fontSize,
                    'bold' => $bold,
                ],
            ]);
        };

        // Terapkan style judul & header
        $applyHeaderStyle('A2:G2', 20);
        $applyHeaderStyle('A3:G3', 20);
        $applyHeaderStyle('A4:G4', 14);
        $applyHeaderStyle('A5:G5', 14);
        $applyHeaderStyle('A7:G8', 15, false);

        // Style body tabel
        $sheet->getStyle("A9:G{$highestRow}")->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Kolom nama & NISN rata kiri
        $sheet->getStyle("B9:C{$highestRow}")->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
            ],
        ]);
    }
}
