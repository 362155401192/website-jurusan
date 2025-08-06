<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SasaranKinerja;

class SasaranKinerjaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kode' => 'SK1', 'nama' => 'Peningkatan Kualitas Lulusan Pendidikan Tinggi'],
            ['kode' => 'SK2', 'nama' => 'Peningkatan Kualitas Dosen Pendidikan Tinggi'],
            ['kode' => 'SK3', 'nama' => 'Peningkatan kualitas Kurikulum dan Pembelajaran'],
        ];

        foreach ($data as $item) {
            SasaranKinerja::create($item);
        }
    }
}
