<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            'Matematika',
            'PJOK',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Bahasa Jawa',
            'Pendidikan Agama Islam',
            'Pendidikan Agama Kristen',
            'Pendidikan Agama Katolik',
            'Pendidikan Agama Hindu',
            'Pendidikan Agama Budha',
            'Pendidikan Agama Konghucu',
            'Seni Budaya',
            'Ilmu Pengetahuan Alam',
            'Ilmu Pengetahuan Sosial',
            'Pendidikan Kewarganegaran',
            'Informatika'
        ];

        foreach ($subjects as $subject) {
            Subject::create([
                'name' => $subject,
                'religion_id' => ($subject == 'Pendidikan Agama Islam' ? '1' : ($subject == 'Pendidikan Agama Kristen' ? '2' : ($subject == 'Pendidikan Agama Katolik' ? '3' : ($subject == 'Pendidikan Agama Hindu' ? '4' : ($subject == 'Pendidikan Agama Budha' ? '5' : ($subject == 'Pendidikan Agama Konghucu' ? '6' : null)))))),
            ]);
        }
    }
}
