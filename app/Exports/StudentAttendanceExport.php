<?php

namespace App\Exports;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StudentAttendanceExport implements WithMultipleSheets
{
    protected Classroom $classroom;
    protected Request $request;
    protected AttendanceInterface $attendance;
    protected ClassroomStudentInterface $classroomStudent;

    public function __construct(Classroom $classroom, Request $request, AttendanceInterface $attendance, ClassroomStudentInterface $classroomStudent)
    {
        $this->classroom = $classroom;
        $this->attendance = $attendance;
        $this->request = $request;
        $this->classroomStudent = $classroomStudent;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        
        $classroomStudents = $this->classroomStudent->whereClassroom($this->classroom->id, $this->request);

        $sheets[] = new ClassroomAttendanceSheet($classroomStudents, $this->classroom, $this->request, $this->attendance, $this->classroomStudent);
        foreach ($classroomStudents as $classroomStudent) {
            $sheets[] = new StudentAttendanceSheet($classroomStudent, $this->request, $this->attendance);
        }

        return $sheets;
    }
}
