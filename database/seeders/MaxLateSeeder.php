<?php

namespace Database\Seeders;

use App\Models\MaxLate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaxLateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaxLate::factory()->create([
            'max_late' => 15,
        ]);
    }
}