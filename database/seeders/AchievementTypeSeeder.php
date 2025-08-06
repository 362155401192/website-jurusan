<?php

namespace Database\Seeders;

use App\Models\AchievementType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AchievementType::insert([
            ['name' => 'Prestasi Belajar'],
            ['name' => 'Prestasi Olahraga'],
            ['name' => 'Prestasi Seni'],
            ['name' => 'Prestasi Lingkungan Hidup'],
        ]);
    }
}
