<?php

namespace App\Services;

use App\Contracts\Interfaces\ClassroomStudentInterface;

class ClassroomStudentService
{
    private ClassroomStudentInterface $classroom;

    public function __construct(ClassroomStudentInterface $classroom)
    {
        $this->classroom = $classroom;
    }

    public function store(string $classroom, string $student_id): void
    {
        $this->classroom->store([
            'classroom_id' => $classroom,
            'student_id' => $student_id,
        ]);      
    }
}
