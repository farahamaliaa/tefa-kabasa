<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\AttendanceRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday',
        ];

        foreach ($days as $day) {
            AttendanceRule::create([
                'day' => $day,
                'role' => RoleEnum::TEACHER,
                'checkin_start' => '07:00:00',
                'checkin_end' => '08:00:00',
                'checkout_start' => '13:00:00',
                'checkout_end' => '19:00:00',
                'is_holiday' => ($day == 'sunday' ? true : false),
            ]);
        }

        foreach ($days as $day) {
            AttendanceRule::create([
                'day' => $day,
                'role' => RoleEnum::STUDENT,
                'checkin_start' => '07:00:00',
                'checkin_end' => '08:00:00',
                'checkout_start' => '13:00:00',
                'checkout_end' => '19:00:00',
                'is_holiday' => ($day == 'sunday' ? true : false),
            ]);
        }
    }
}
