<?php

namespace Database\Seeders;

use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::insert([
            [
                'user_id' => 1,
                'menu_id' => 27,
                'title' => 'Teaching Factory',
                'content' => 'Teaching Factory adalah layanan dari Jurusan Bisnis dan Informatika di Politeknik Negeri Banyuwangi yang menyediakan ruang khusus bagi mahasiswa untuk melakukan penelitian, magang, atau mengerjakan proyek dari luar kampus. Ruangan ini dilengkapi dengan fasilitas yang menyerupai lingkungan kerja di industri, memungkinkan mahasiswa untuk mengaplikasikan teori dalam konteks praktis. Dengan dukungan dosen dan praktisi industri, mahasiswa mendapatkan pengalaman kerja nyata, mengembangkan keterampilan teknis dan soft skills seperti manajemen waktu, komunikasi, dan kerja sama tim. Kolaborasi dengan perusahaan memberikan akses ke proyek-proyek nyata, membuka peluang jaringan profesional, dan mempersiapkan mahasiswa lebih baik untuk menghadapi tantangan dunia kerja.',
                'slug' => 'teaching-factory',
                'image' => 'tefa.jpg',
                'is_publish' => true,
                'published_at' => Carbon::now(),
            ],
        ]);
    }
}
