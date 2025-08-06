<?php

namespace Database\Seeders;

use App\Models\CooperationField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CooperationFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CooperationField::insert([
            ['name' => 'Bidang Sosial'],
            ['name' => 'Bidang Pendidikan'],
            ['name' => 'Bidang Olahraga'],
        ]);
    }
}
