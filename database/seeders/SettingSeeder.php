<?php

namespace Database\Seeders;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            [
                'group' => 'General',
                'option' => 'web_name',
                'label' => 'Nama Website',
                'value' => 'Politeknik Negeri Banyuwangi',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'General',
                'option' => 'web_description',
                'label' => 'Deskripsi Website',
                'value' => 'Web resmi Jurusan Teknik Informatika Politeknik Negeri Banyuwangi',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'General',
                'option' => 'web_author',
                'label' => 'Pemilik',
                'value' => 'Jurusan Teknik Informatika Politeknik Negeri Banyuwangi',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'SEO',
                'option' => 'meta_description',
                'label' => 'Meta Deskripsi',
                'value' => 'Teknik Informatika Politeknik Negeri Banyuwangi.',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'SEO',
                'option' => 'meta_keyword',
                'label' => 'Meta Keyword',
                'value' => 'ti, teknik informatika, poliwangi, rekayasa perangkat lunak, jinggo',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Social',
                'option' => 'fb',
                'label' => 'Facebook',
                'value' => 'Teknik Informatika Poliwangi',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Social',
                'option' => 'ig',
                'label' => 'Instagram',
                'value' => 'ti.poliwangi',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Social',
                'option' => 'twitter',
                'label' => 'Twitter',
                'value' => '-',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Social',
                'option' => 'youtube',
                'label' => 'Youtube',
                'value' => 'TI POLIWANGI TV',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Contact',
                'option' => 'address',
                'label' => 'Alamat',
                'value' => 'Jalan Raya Jember No.KM13, Kawang, Labanasem, Kec. Kabat, Kabupaten Banyuwangi, Jawa Timur 68461',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Contact',
                'option' => 'phone',
                'label' => 'Telepon',
                'value' => '(0333) 636780',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Contact',
                'option' => 'email',
                'label' => 'Email',
                'value' => 'ti@poliwangi.ac.id',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Image',
                'option' => 'logo',
                'label' => 'Logo',
                'value' => 'logo.png',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Image',
                'option' => 'favicon',
                'label' => 'Favicon',
                'value' => 'favicon.png',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
