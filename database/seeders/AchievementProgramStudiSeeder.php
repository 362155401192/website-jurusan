<?php

namespace Database\Seeders;

use App\Models\AchievementProgramStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AchievementProgramStudi::insert([
            ['name' => 'Teknologi Rekayasa Perangkat Lunak'],
            ['name' => 'Teknologi Rekayasa Komputer'],
            ['name' => 'Bisnis Digital'],
        ]);
    }
}
