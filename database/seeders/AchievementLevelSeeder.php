<?php

namespace Database\Seeders;

use App\Models\AchievementLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AchievementLevel::insert([
            ['name' => 'Internasional'],
            ['name' => 'Nasional'],
            ['name' => 'Provinsi'],
            ['name' => 'Kabupaten'],
            ['name' => 'Kecamatan'],
        ]);
    }
}
