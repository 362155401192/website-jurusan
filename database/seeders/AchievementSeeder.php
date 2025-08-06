<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Achievement::insert([
            [
                'achievement_level_id' => 1,
                'achievement_type_id' => 2,
                'achievement_program_studi_id' => 1,
                'user_id' => 1,
                'title' => 'Juara Polythechnic Creative Festival 2022',
                'location' => 'Polimedia Jakarta',
                'date' => '2023-04-01',
                'slug' => 'juara-poli',
                'description' => 'Dalam ajang ini Poliwangi mengirim 3 Tim dan membawa pulang 3 juara sekaligus. Dua Tim diantaranya berasal dari Program Studi D4 Teknologi Rekayasa Perangkat lunak .
                Mahasiswa/mahasiswi tersebut adalah :

                1. M. Fahmi Alfaris dan TIM yang terdiri dari Afdan Syukron, Yuniar Friska, dan Almahesa Jabbar mendapatkan Juara 1 Lomba kategori Campus Video.
                2. Erviannur Rahmasari mendapatkan juara 1 Lomba kategori News Writer.

                Semoga dapat terus berprestasi dan membanggakan kampus Politeknik Negeri Banyuwangi.',
                'image' => '1.png',
                'is_external_link' => false,
                'is_publish' => true,
                'published_at' => Carbon::now(),
                'publisher_id' => 1,
            ],
            [
                'achievement_level_id' => 2,
                'achievement_type_id' => 2,
                'achievement_program_studi_id' =>2,
                'user_id' => 1,
                'title' => 'Juara 3 KMIPN ke-IV 2022',
                'location' => 'Politeknik Negeri Batam',
                'date' => '2023-04-01',
                'slug' => 'juara-3-kmipn',
                'description' => 'Politeknik Negeri Banyuwangi berhasil mendapatkan 3 mendali dalam event KMIPN ke-IV Tahun 2022 yang di selenggarakan di Politeknik Negeri Batam.

                Dalam ajang ini Poliwangi mengirimkan 3 tim dan tim yang di kirimkan berhasil meraih 3 mendali sekaligus dalam kategori :
                1. Juara 3 Kategori IoT
                2. Juara 3 Kategori Perencanaan Bisnis bidang TIK
                3. Juara 3 Kategori E-Government

                Sekali lagi kami ucapkan selamat kepada pemenenang, semoga dapat terus berprestasi dan membanggakan kampus Poliwangi',
                'image' => '2.png',
                'is_external_link' => false,
                'is_publish' => true,
                'published_at' => Carbon::now(),
                'publisher_id' => 1,
            ],

        ]);
    }
}
