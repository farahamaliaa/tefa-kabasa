<?php

namespace Database\Seeders;

use App\Models\SchoolPoint;
use Illuminate\Database\Seeder;

class SchoolPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolPoint::factory()->create([
            'point' => 100,
            'description' => 'Peringatan pertama'
        ]);

        SchoolPoint::factory()->create([
            'point' => 150,
            'description' => 'Peringatan kedua'
        ]);

        SchoolPoint::factory()->create([
            'point' => 200,
            'description' => 'Peringatan ketiga'
        ]);
    }
}
