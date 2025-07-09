<?php

namespace App\Imports;

use App\Models\ClassroomStudent;
use App\Models\Student;
use App\Models\StudentRepair;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class StudentRepairImport implements ToModel
{
    private $employee;

    public function __construct($employee)
    {
        $this->employee = $employee;
    }

    public function model(array $row)
    {
        if (in_array($row[0], ['Nama siswa', 'Contoh Format (Jangan di Hapus)']) || $row[0] == null) {
            return null;
        }

        $student = Student::with('user')->get()->where('user.name', $row[0])->first();
        // $user = Student::find($student->id);
        // $user->point -= $row[2];
        // $user->save();

        $classroomStudent = ClassroomStudent::where('student_id', $student->id)->first();
        $start_date = $row[3] ? Carbon::instance(Date::excelToDateTimeObject($row[3])) : null;
        $end_date = $row[4] ? Carbon::instance(Date::excelToDateTimeObject($row[4])) : null;

        StudentRepair::create([
            'classroom_student_id' => $classroomStudent->id,
            'repair' => $row[1],
            'point' => $row[2],
            'start_date' => $start_date,
            'end_date' => $end_date,
            'employee_id' => $this->employee,
        ]);
    }
}
