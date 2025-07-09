<?php

    namespace App\Services;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Http\Requests\SingleStoreStudentRepairRequest;
use App\Http\Requests\StoreStudentRepairRequest;
use App\Models\Employee;
use App\Models\Student;
use App\Models\StudentRepair;

    class StudentRepairService
    {
        private StudentInterface $student;
        private ClassroomStudentInterface $classroom;
        private StudentRepairInterface $studentRepair;
        private EmployeeInterface $employee;

        public function __construct(StudentInterface $student, ClassroomStudentInterface $classroom, StudentRepairInterface $studentRepair, EmployeeInterface $employee)
        {
            $this->student = $student;
            $this->classroom = $classroom;
            $this->studentRepair = $studentRepair;
            $this->employee = $employee;
        }

        public function store(StoreStudentRepairRequest $request): void
        {
            $data = $request->validated();
            $user = auth()->user();
            $employee = $this->employee->getByUser($user->id);

            $start_date = $data['start_date'];
            $end_date = $data['end_date'];

            foreach ($data['repeater-group'] as $group) {
                $repair = $group['repair'];
                $point = $group['point'];

                foreach ($group['classroom_student_id'] as $student_id) {
                    // $student = $this->student->show($student_id);
                    // $this->student->update($student->id, ['point' => ($student->point - $point) ]);

                    $classroom = $this->classroom->whereStudent($student_id);
                    $this->studentRepair->store([
                        'employee_id' => $employee->id,
                        'repair' => $repair,
                        'point' => $point,
                        'classroom_student_id' => $classroom->id,
                        'start_date' => $start_date,
                        'end_date' => $end_date
                    ]);
                }
            }
        }

        public function single_store(SingleStoreStudentRepairRequest $request, Student $student): void
        {
            $data = $request->validated();
            $classroom = $this->classroom->whereStudent($student->id);

            $this->studentRepair->store([
                'employee_id' => auth()->user()->employee->id,
                'repair' => $data['repair'],
                'point' => $data['point'],
                'classroom_student_id' => $classroom->id,
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date']
            ]);
        }

        public function update_point(StudentRepair $studentRepair) : void
        {
            $student = $this->student->whereClassroomStudent($studentRepair->classroom_student_id);
            $this->student->update($student->id, ['point' => ($student->point - $studentRepair->point) ]);
            $this->studentRepair->update($studentRepair->id, ['is_approved' => true]);
        }
    }
