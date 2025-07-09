<?php

namespace App\Services\School;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Http\Requests\StoreAttendanceRuleRequest;
use App\Http\Requests\StoreClassroomRequest;
use Faker\Provider\Uuid;

class ClassroomService
{
    private ClassroomInterface $classroom;
    private SchoolYearInterface $schoolYear;

    public function __construct(ClassroomInterface $classroom, SchoolYearInterface $schoolYear)
    {
        $this->classroom = $classroom;
        $this->schoolYear = $schoolYear;
    }

    public function store(StoreClassroomRequest $request): mixed
    {
        $school_year_id = $this->schoolYear->active();
        $data = $request->validated();
        $values = [];

        foreach ($data['store-class'] as $item) {

            if ($this->classroom->duplicate($item['name'])) {
                return redirect()->back()->with('error', 'Data sudah tersedia');
            } else {
                array_push($values, [
                    'id' => Uuid::uuid(),
                    'name' => $item['name'],
                    'level_class_id' => $item['level_class_id'],
                    'employee_id' => $item['employee_id'],
                    'school_year_id' => $school_year_id->id,
                ]);
            }
        }

        $this->classroom->insert($values);
        return redirect()->back()->with('success', 'Berhasil menambahkan kelas');
    }
}
