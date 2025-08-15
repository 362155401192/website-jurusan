<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SasaranKinerja;
use App\Models\IndikatorKinerjaKegiatan;

class IndikatorKinerjaKegiatanSeeder extends Seeder
{
    public function run()
    {
        $indikatorPerSasaran = [
            'S1' => [
                ['kode' => 'IKU S1.1', 'deskripsi' => ' Persentase Lulusan S1 dan D4/D3/D2 yang dalam berhasil mendapatkan pekerjaan; melanjutkan studi; atau menjadi wiraswasta'],
                ['kode' => 'IKU S1.2', 'deskripsi' => 'Persentase Lulusan S1 dan D4/D3/D2 yang menghabiskan paling sedikit 20 (dua puluh) sks diluar kampus; atau meraih prestasi paling rendah tingkat nasional '],
            ],
            'S2' => [
                ['kode' => 'IKU S2.1', 'deskripsi' => 'Persentase dosen yang berkegiatan tridarma di kampus lain, di QS100 berdasarkan bidang ilmu (QS100 by subject), bekerja sebagai praktisi didunia industri, atau membina mahasiswa yang berhasil meraih prestasi paling rendah tingkat nasional dalam 5(lima) tahun terakhir'],
                ['kode' => 'IKU S2.2', 'deskripsi' => 'Persentase dosen tetap berkualifikasi akademik S3; memiliki sertifikat kompetensi/profesi yang diakui oleh industri dan ddunia kerja; atau berasal dari kalangan praktisi profesional, dunia industri, atau dunia kerja '],
                ['kode' => 'IKU S2.3', 'deskripsi' => 'Jumlah Keluaran penelitian dan pengabdian kepada masyarakat yang berhasil mendapatkan recognisi internasional atau diterapkan oleh masyarakat per jumlah dosen '],
            ],
            'S3' => [
                ['kode' => 'IKU S3.1', 'deskripsi' => 'Persentase program studi S1 dan D4/D3/D2 yang melaksanakan kerjasama dengan mitra'],
                ['kode' => 'IKU S3.2', 'deskripsi' => 'Persentase mata kuliah S1 dan D4/D3/D2 yang menggunakan metode pembelajaran pemecahan kasus (case method) atau pembelajaran kelompok berbasis projek (team-based project) sebagai sebagian bobot evaluasi '],
                ['kode' => 'IKU S3.3', 'deskripsi' => 'Persentase program studi S1 dan D4/D3/D2 yang memiliki akreditasi atau sertifikat internasional yang diakui oleh pemerintah'],
            ],
        ];

        $programStudis = [1,2,3];

        foreach (SasaranKinerja::all() as $sasaran) {
            $counter = 0;

            foreach ($indikatorPerSasaran[$sasaran->kode] ?? [] as $item) {
                IndikatorKinerjaKegiatan::create([
                    'sasaran_kinerja_id' => $sasaran->id,
                    'kode' => $item['kode'],
                    'deskripsi' => $item['deskripsi'],
                    'target_akhir' => rand(80, 100),
                    'realisasi_akhir' => rand(70, 100),
                    'program_studi_id' => $programStudis[$counter++ % count($programStudis)],
                ]);
            }
        }
    }
}
