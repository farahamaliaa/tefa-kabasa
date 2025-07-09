<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            "ACEH",
            "SUMATERA UTARA",
            "SUMATERA BARAT",
            "RIAU",
            "JAMBI",
            "SUMATERA SELATAN",
            "BENGKULU",
            "LAMPUNG",
            "KEPULAUAN BANGKA BELITUNG",
            "KEPULAUAN RIAU",
            "DKI JAKARTA",
            "JAWA BARAT",
            "JAWA TENGAH",
            "DI YOGYAKARTA",
            "JAWA TIMUR",
            "BANTEN",
            "BALI",
            "NUSA TENGGARA BARAT",
            "NUSA TENGGARA TIMUR",
            "KALIMANTAN BARAT",
            "KALIMANTAN TENGAH",
            "KALIMANTAN SELATAN",
            "KALIMANTAN TIMUR",
            "KALIMANTAN UTARA",
            "SULAWESI UTARA",
            "SULAWESI TENGAH",
            "SULAWESI SELATAN",
            "SULAWESI TENGGARA",
            "GORONTALO",
            "SULAWESI BARAT",
            "MALUKU",
            "MALUKU UTARA",
            "PAPUA BARAT",
            "PAPUA",
        ];

        foreach ($provinces as $province) {
            Province::factory()->create(['name' => $province]);
        }
    }
}
