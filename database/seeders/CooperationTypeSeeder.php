<?php

namespace Database\Seeders;

use App\Models\CooperationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CooperationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CooperationType::insert([
            ['name' => 'Kerjasama Langsung'],
            ['name' => 'Kerjasama Kontrak'],
        ]);
    }
}
