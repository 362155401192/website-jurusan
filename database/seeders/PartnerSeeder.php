<?php

namespace Database\Seeders;

use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::insert([
            [
                // 'user_id' => 1,
                'name' => 'PT. Bumi Suksesindo (BSI)',
                'email' => 'bsi.info@merdekacoppergold.com',
                'phone_number' => '62333 710368 ',
                'address' => 'Desa Sumberagung, Kecamatan Pesanggaran, Kabupaten Banyuwangi, Provinsi Jawa Timur, Indonesia',
                'image' => 'bsi.png',
                // 'is_publish' => true,
                // 'published_at' => Carbon::now(),
                // 'publisher_id' => 1
            ],
            [
                // 'user_id' => 1,
                'name' => 'Pemerintah Kabupaten Banyuwangi',
                'email' => 'info@banyuwangikab.go.id',
                'phone_number' => '62333 710368 ',
                'address' => 'Kabupaten Banyuwangi, Provinsi Jawa Timur, Indonesia',
                'image' => 'banyuwangi.png',
                // 'is_publish' => true,
                // 'published_at' => Carbon::now(),
                // 'publisher_id' => 1
            ],
        ]);
    }
}
