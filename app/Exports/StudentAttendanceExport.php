<?php

namespace App\Exports;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Models\Attendance;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Http\Request;

class StudentAttendanceExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $classroom_id;
    private AttendanceInterface $attendance;
    private Request $request;

    public function __construct($classroom_id, Request $request, AttendanceInterface $attendance)
    {
        $this->classroom_id = $classroom_id;
        $this->attendance = $attendance;
        $this->request = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('school.export.invoices-attendance-student', [
            'items' => $this->attendance->exportClassAndDate($this->classroom_id, $this->request)
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

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

        $headerRange = "A1:{$highestColumn}1"; // Sesuaikan dengan rentang header
        $sheet->getStyle($headerRange)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFFF00'], // Warna background kuning
            ],
        ]);
    }
}
