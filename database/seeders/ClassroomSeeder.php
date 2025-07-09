<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\ClassroomStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classroom = Classroom::create([
            'id' => '1',
            'name' => '11 Rpl 1',
            'employee_id' => '1',
            'school_year_id' => '4',
            'level_class_id' => '2'
        ]);

        ClassroomStudent::create([
            'id' => '1',
            'student_id' => '1',
            'classroom_id' => $classroom->id,
        ]);
    }
}
