<?php

namespace App\Exports;

use App\Contracts\Interfaces\EmployeeJournalInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmployeeJournalExport implements FromView, ShouldAutoSize, WithStyles
{

    private EmployeeJournalInterface $employeeJournal;
    private Request $request;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(EmployeeJournalInterface $employeeJournal, Request $request)
    {
        $this->employeeJournal = $employeeJournal;
        $this->request = $request;
    }

    public function view(): View
    {
        $data = $this->employeeJournal->export($this->request);
        return view('school.export.invoices-journal-staff', [
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
