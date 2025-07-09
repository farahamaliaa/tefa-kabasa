<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            RegionalSeeder::class,
            ReligionSeeder::class,
            SchoolSeeder::class,
            LessonHourSeeder::class,
            SchoolYearSeeder::class,
            LevelClassSeeder::class,
            EmployeeSeeder::class,
            StudentSeeder::class,
            ClassroomSeeder::class,
            ClassroomStudentSeeder::class,
            // AttendanceSeeder::class,
            ExtracurricularSeeder::class,
            AttendanceRuleSeeder::class,
            SubjectSeeder::class,
            SchoolPointSeeder::class,
            MaxLateSeeder::class,
        ]);
    }
}
