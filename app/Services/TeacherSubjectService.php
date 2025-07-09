<?php

namespace App\Services;

use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Http\Requests\StoreTeacherSubjectRequest;

class TeacherSubjectService
{
    private TeacherSubjectInterface $teacherSubject;

    public function __construct(TeacherSubjectInterface $teacherSubject)
    {
        $this->teacherSubject = $teacherSubject;
    }

    public function store(StoreTeacherSubjectRequest $request, $employee): int
    {
        $rules = $request->validated();
        $addedSubjectsCount = 0;

        foreach ($rules['subject'] as $data) {
            $result = $this->teacherSubject->whereTeacher($data, $employee);

            if ($result) {
                session()->flash('warning', 'Mata pelajaran guru sudah tersedia');
                continue;
            }

            $this->teacherSubject->store([
                'employee_id' => $employee,
                'subject_id' => $data,
            ]);

            $addedSubjectsCount++;
        }

        return $addedSubjectsCount;
    }
}
