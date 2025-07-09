<?php

namespace App\Exports;

use App\Contracts\Interfaces\AttendanceInterface;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Alignment;   
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TeacherAttendanceExport implements FromView, ShouldAutoSize, WithStyles
{
    private Request $request;
    private AttendanceInterface $attendance;

    public function __construct(Request $request, AttendanceInterface $attendance)
    {
        $this->request = $request;
        $this->attendance = $attendance;
    }

    public function view() : View
    {
        $data = $this->attendance->whereModel('App\Models\Employee', $this->request);
        return view('school.export.invoices-attendance-teacher', [
            'items' => $data,
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

        $sheet->getStyle("A1:{$highestColumn}1")->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '5D87FF',
                ],
            ],
        ]);
    }
}
