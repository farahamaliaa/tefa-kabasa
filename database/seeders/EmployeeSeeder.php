<?php

namespace Database\Seeders;

use App\Enums\GenderEnum;
use App\Enums\RoleEnum;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'id' => '1',
            'nip' => '123456789101234567',
            'birth_date' => now(),
            'birth_place' => 'Malang',
            'gender' => GenderEnum::MALE->value,
            'nik' => '12345678910123',
            'phone_number' => '00000000000',
            'address' => 'Permata Regency',
            'status' => RoleEnum::TEACHER->value,
            'active' => '1',
            'user_id' => '2',
            'religion_id' => '1',
        ]);

        Employee::create([
            'id' => '2',
            'nip' => '123456789101234567',
            'birth_date' => now(),
            'birth_place' => 'Malang',
            'gender' => GenderEnum::MALE->value,
            'nik' => '12345678910123',
            'phone_number' => '00000000000',
            'address' => 'Permata Regency',
            'status' => RoleEnum::STAFF->value,
            'active' => '1',
            'user_id' => '4',
            'religion_id' => '1',
        ]);
    }
}
