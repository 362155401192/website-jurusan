<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IndikatorKinerjaKegiatan;
use App\Models\TargetRealisasi;

class TargetRealisasiSeeder extends Seeder
{
    public function run()
    {
        $indikators = IndikatorKinerjaKegiatan::all();

        foreach ($indikators as $indikator) {
            foreach (range(1, 3) as $triwulan) {
                TargetRealisasi::create([
                    'indikator_kinerja_kegiatan_id' => $indikator->id,
                    'triwulan' => (string)$triwulan,
                    'target' => rand(20, 100),
                    'realisasi' => rand(10, 90),
                    'file_pendukung' => null,
                ]);
            }
        }
    }
}
