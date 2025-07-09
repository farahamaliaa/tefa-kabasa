<?php

namespace App\Exports;

use App\Contracts\Interfaces\LessonScheduleInterface;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Alignment;   
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class TeacherJournalExport implements FromView, ShouldAutoSize, WithStyles
{
    private LessonScheduleInterface $lessonSchedule;
    private Request $request;

    public function __construct(LessonScheduleInterface $lessonSchedule, Request $request) {
        $this->lessonSchedule = $lessonSchedule;
        $this->request = $request;
    }

    public function view() : View
    {
        $data = $this->lessonSchedule->export($this->request);
        return view('school.export.invoices-journal-teacher', [
            'items' => $data,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->getAlignment()
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
                    'argb' => '3CB0E5',
                ],
            ],
        ]);
    }
}
