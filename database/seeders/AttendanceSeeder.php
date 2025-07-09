<?php

namespace Database\Seeders;

use App\Enums\AttendanceEnum;
use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attendance::create([
            'id' => '1',
            'classroom_student_id' => '1',
            'point' => '10',
            'proof' => null,
            'status' => AttendanceEnum::PRESENT->value,
            'checkin' => '07:00:00',
            'checkout' => '16:00:00'
        ]);
    }
}
