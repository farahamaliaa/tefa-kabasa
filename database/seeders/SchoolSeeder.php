<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Enums\SchoolEnum;
use App\Enums\SemesterEnum;
use App\Models\School;
use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = School::create([
            'id' => '1',
            'npsn' => '89269',
            'phone_number' => '08618802',
            'image' => 'logo.png',
            'user_id' => '3',
            'province_id' => '1',
            'city_id' => '2',
            'sub_district_id' => '30',
            'pas_code' => '35467',
            'address' => 'Jl. seeder, desa ajinomoto',
            'head_school' => 'Aminuddin',
            'nip' => '407967',
            'type' => SchoolEnum::NEGERI->value,
            'level' => SchoolEnum::SMASMKMA->value,
            'accreditation' => 'Akreditasi A',
        ]);

        Semester::create([
            'type' => SemesterEnum::GANJIL
        ]);
    }
}
