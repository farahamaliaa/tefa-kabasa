<?php

namespace App\Exports;

use App\Models\Classroom;
use App\Models\SchoolYear;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class JadwalPelajaranExportNew implements WithHeadings, WithMultipleSheets
{
    use RegistersEventListeners;

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

    public function sheets(): array
    {
        $sheets = [];
        $classrooms = Classroom::select('name')->get();
        $school_year = SchoolYear::where('active', true)->first();

        $sheets[] = new JadwalContohSheet($school_year->school_year);
        foreach ($classrooms as $classroom) {
            $sheets[] = new JadwalPelajaranSheet($classroom, $school_year->school_year);
        }

        return $sheets;
    }

}
