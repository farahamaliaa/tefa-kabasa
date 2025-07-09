<?php

namespace App\Imports;

use App\Models\ClassroomStudent;
use App\Models\Regulation;
use App\Models\Student;
use App\Models\StudentViolation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentViolationImport implements ToModel
{
    public function model(array $row)
    {
        if (in_array($row[0], ['Nama Siswa', 'Contoh Format (Jangan di Hapus)']) || $row[0] == null) {
            return null;
        }

        $student = Student::with('user')->get()->where('user.name', $row[0])->first();
        $regulation = Regulation::where('violation', $row[1])->first();

        $classroomStudent = ClassroomStudent::where('student_id', $student->id)->first();

        $user = Student::find($student->id);
        $user->point += $regulation->point;
        $user->save();

        StudentViolation::create([
            'classroom_student_id' => $classroomStudent->id,
            'regulation_id' => $regulation->id,
        ]);
    }
}
