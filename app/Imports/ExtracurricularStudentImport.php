<?php

namespace App\Imports;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\ExtracurricularStudentInterface;
use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\ExtracurricularStudent;
use App\Models\Student;

class ExtracurricularStudentImport implements ToModel
{
    private ClassroomStudentInterface $classroomStudent;
    private ExtracurricularStudentInterface $extracurricularStudent;
    private $extracurricular_id;

    public function __construct(ClassroomStudentInterface $classroomStudent, ExtracurricularStudentInterface $extracurricularStudent, $extracurricular_id)
    {
        $this->classroomStudent = $classroomStudent;
        $this->extracurricularStudent = $extracurricularStudent;
        $this->extracurricular_id = $extracurricular_id;
    }

    public function model(array $row)
    {
        if ($row[0] == 'Kelas' || $row[0] == null || $row[0] == 'Contoh Format (Jangan Dihapus)') {
            return null;
        }

        $classroom = Classroom::where('name', $row[0])->first();
        $student = Student::whereHas('user', function ($query) use ($row) {
            $query->where('name', $row[1]);
        })->first();

        if ($classroom != null && $student != null) {
            $check = $this->classroomStudent->check($classroom->id, $student->id);
            $exists = $this->extracurricularStudent->check($this->extracurricular_id, $student->id);
            if ($check && !$exists) {
                $this->extracurricularStudent->store([
                    'student_id' => $student->id,
                    'extracurricular_id' => $this->extracurricular_id
                ]);
            } else {    
                return null;
            }
        }
    }
}