<?php

namespace Database\Seeders;

use App\Models\Cooperation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CooperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cooperation::insert([
            [
                'partner_id' => 1,
                'cooperation_field_id' => 1,
                'cooperation_type_id' => 1,
                'user_id' => 1,
                'name' => 'Kerjasama bidang penelitian dan pengabdian kepada masysrakat, peningkatan kualitas sumber daya manusia, dan kerjanpraktek/magang kerja industri mahasiswa',
                'benefit' => 'Penelitian, Beasiswa Pendidikan Mahasiswa, Terselenggaranya kuliah tamu di Program Studi Teknik Mesin terkait teknologi mobil listrik',
                'date_start' => '2018-05-03',
                'date_end' => '2023-05-03',
                'link' => 'https://poliwangi.ac.id/',
                'is_external_link' => false,
                'is_publish' => true,
                'published_at' => Carbon::now(),
                'publisher_id' => 1,
            ], [
                'partner_id' => 2,
                'cooperation_field_id' => 2,
                'cooperation_type_id' => 2,
                'user_id' => 1,
                'name' => 'Kerjasama bidang penelitian dan pengabdian kepada masysrakat, peningkatan kualitas sumber daya manusia, dan kerjanpraktek/magang kerja industri mahasiswa',
                'benefit' => 'Penelitian, Beasiswa Pendidikan Mahasiswa, Terselenggaranya kuliah tamu di Program Studi Teknik Mesin terkait teknologi mobil listrik',
                'date_start' => '2018-12-03',
                'date_end' => '2023-02-03',
                'link' => 'https://poliwangi.ac.id/',
                'is_external_link' => false,
                'is_publish' => true,
                'published_at' => Carbon::now(),
                'publisher_id' => 1,
            ]
        ]);
    }
}
