<?php

namespace App\Services;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Requests\SingleStoreStudentViolationRequest;
use App\Http\Requests\StoreStudentViolationRequest;
use App\Models\Student;

class StudentViolationService
    {
        private RegulationInterface $regulation;
        private StudentInterface $student;
        private StudentViolationInterface $studentViolation;
        private ClassroomStudentInterface $classroom;

        public function __construct(RegulationInterface $regulation, StudentInterface $student, StudentViolationInterface $studentViolation, ClassroomStudentInterface $classroom)
        {
            $this->regulation = $regulation;
            $this->student = $student;
            $this->studentViolation = $studentViolation;
            $this->classroom = $classroom;
        }

        public function store(StoreStudentViolationRequest $request): void
        {
            $data = $request->validated();

            foreach ($data as $group) {
                foreach ($group as $value) {
                    $regulation_id = $value['violation_id'];

                    $regulation = $this->regulation->show($value['violation_id']);

                    foreach ($value['student_id'] as $student_id) {
                        $student = $this->student->show($student_id);
                        $this->student->update($student->id, ['point' => ($student->point + $regulation->point) ]);
                    }

                    foreach ($value['student_id'] as $studentId) {
                        $classroom = $this->classroom->whereStudent($studentId);
                        $this->studentViolation->store([
                            'employee_id' => auth()->user()->employee->id,
                            'classroom_student_id' => $classroom->id,
                            'regulation_id' => $regulation_id,
                        ]);
                    }
                }
            }
        }

        public function single_store(SingleStoreStudentViolationRequest $request, Student $student): void
        {
            $data = $request->validated();
            $classroom = $this->classroom->whereStudent($student->id);

            foreach($data['violation_id'] as $value){
                $regulation = $this->regulation->show($value);

                $this->studentViolation->store([
                    'employee_id' => auth()->user()->employee->id,
                    'classroom_student_id' => $classroom->id,
                    'regulation_id' => $value,
                ]);

                $student = $this->student->show($student->id);
                $this->student->update($student->id, ['point' => ($student->point + $regulation->point) ]);
            }

        }

        public function update(): void
        {

        }

        public function delete(): void
        {

        }
    }
