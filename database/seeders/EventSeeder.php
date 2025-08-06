<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::insert([

            [
                'user_id' => 1,
                'title' => 'PELATIHAN DAN SERTIFIKASI VSGA KOMINFO 2023',
                'thumbnail' => 'test.jpg',
                'summary' => 'Pelatihan dan Sertifikasi VSGA 2023',
                'content' => '
                <p>Program Vocational School Graduate Academy (VSGA) merupakan program pelatihan dan sertifikasi berbasis kompetensi nasional yang ditujukan bagi lulusan SMK/sederajat serta Diploma 3 dan 4 yang belum bekerja dan memiliki latar belakang pendidikan di bidang Science, Technology, Engineering, dan Math (STEM). Program VSGA terdiri dari Pelatihan dan Sertifikasi yang diselenggarakan secara luring dan daring.</p>
                <p><br>Untuk Informasi Pendaftaran dan Persyaratan silahkan akses via: https://digitalent.kominfo.go.id/akademi/VSGA</p>',
                'date' => '2023-04-01',
                'slug' => 'vsga-2023',
                'is_publish' => true,
                'published_at' => Carbon::now(),
                'publisher_id' => 1,
            ],
            [
                'user_id' => 1,
                'title' => 'MSIB Bangkit 2023 Batch 2',
                'thumbnail' => 'mandiri.jpg',
                'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                'content' => '
                <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                'date' => '2023-04-01',
                'slug' => 'bangkit-2023',
                'is_publish' => true,
                'published_at' => Carbon::now(),
                'publisher_id' => 1,
            ],
            [
                'user_id' => 1,
                'title' => 'MSIB Bangkit 2023 Batch 2',
                'thumbnail' => 'bangkit.jpeg',
                'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                'content' => '
                <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                'date' => '2023-04-01',
                'slug' => 'bangkit-2023',
                'is_publish' => true,
                'published_at' => Carbon::now(),
                'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],
                [
                    'user_id' => 1,
                    'title' => 'MSIB Bangkit 2023 Batch 2',
                    'thumbnail' => 'mandiri.jpg',
                    'summary' => 'Bangkit Academy 2023 By Google, GoTo, Traveloka',
                    'content' => '
                    <p><br>Untuk Informasi Lebih Lanjut terkait Pendaftaran dan Persyaratan silahkan akses via: https://kampusmerdeka.kemdikbud.go.id/program/studi-independen/</p>',
                    'date' => '2023-04-01',
                    'slug' => 'bangkit-2023',
                    'is_publish' => true,
                    'published_at' => Carbon::now(),
                    'publisher_id' => 1,
                ],

        ]);
    }
}
