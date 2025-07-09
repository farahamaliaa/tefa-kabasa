<?php

namespace Database\Seeders;

use App\Models\Extracurricular;
use App\Models\ExtracurricularStudent;
use Illuminate\Database\Seeder;
use Faker\Provider\Uuid;

class ExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $extracurricular = Extracurricular::create([
            'id' => Uuid::uuid(),
            'name' => 'Sepak Bola',
            'employee_id' => '1',
        ]);

        ExtracurricularStudent::create([
            'student_id' => '1',
            'extracurricular_id' => $extracurricular->id,
        ]);
    }
}
