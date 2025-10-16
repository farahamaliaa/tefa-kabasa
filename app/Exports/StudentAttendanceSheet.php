<?php

namespace App\Exports;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Enums\AttendanceEnum;
use App\Models\ClassroomStudent;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class StudentAttendanceSheet implements FromCollection, WithTitle, WithStyles, ShouldAutoSize
{
    protected $classroomStudent;
    private AttendanceInterface $attendance;
    private Request $request;

    public function __construct(ClassroomStudent $classroomStudent, Request $request, AttendanceInterface $attendance)
    {
        $this->classroomStudent = $classroomStudent;
        $this->attendance = $attendance;
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $attendances = $this->attendance->exportClassAndDate($this->classroomStudent->classroom_id, $this->request)->where('model_id', $this->classroomStudent->id);

        $statusCounts = [
            'hadir' => $attendances->where('status', AttendanceEnum::PRESENT)->count(),
            'telat' => $attendances->where('status', AttendanceEnum::LATE)->count(),
            'sakit' => $attendances->where('status', AttendanceEnum::SICK)->count(),
            'izin' => $attendances->where('status', AttendanceEnum::PERMIT)->count(),
            'alpha' => $attendances->where('status', AttendanceEnum::ALPHA)->count(),
        ];

        $data = collect([
            ['RINGKASAN KEHADIRAN'],
            ['Hadir', $statusCounts['hadir'] ?? 0],
            ['Telat', $statusCounts['telat'] ?? 0],
            ['Sakit', $statusCounts['sakit'] ?? 0],
            ['Izin', $statusCounts['izin'] ?? 0],
            ['Alpha', $statusCounts['alpha'] ?? 0],
            [''],
            ['DETAIL KEHADIRAN'],
            ['No', 'Tanggal', 'Nama', 'Kelas', 'Keterangan', 'Masuk', 'Pulang', 'Poin']
        ]);

        $no = 1;
        foreach ($attendances as $attendance) {
            $data->push([
                $no++,
                \Carbon\Carbon::parse($attendance->created_at)->format('d-m-Y'),
                $attendance->model->student->user->name,
                $attendance->model->classroom->name,
                $attendance->status->label(),
                $attendance->checkin ? \Carbon\Carbon::parse($attendance->checkin)->format('H:i') : '-',
                $attendance->checkout ? \Carbon\Carbon::parse($attendance->checkout)->format('H:i') : '-',
                $attendance->point,
            ]);
        }

        return $data;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        $name = $this->classroomStudent->student->user->name;
        return strlen($name) > 31 ? substr($name, 0, 28) . '...' : $name;
    }

    /**
     * @param Worksheet $sheet
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $sheet->mergeCells('A1:B1'); 
        $sheet->mergeCells('A8:H8'); 

        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('A1:B1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'], 
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => '5D87FF'], 
            ],
        ]);

        $sheet->getStyle('A8:H9')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFFF00'], 
            ],
        ]);
    }
}
