<?php

namespace Database\Seeders;

use App\Models\EmployeeProgramStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeProgramStudisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeProgramStudi::insert([
            ['name' => 'Teknologi Rekayasa Perangkat Lunak'],
            ['name' => 'Teknologi Rekayasa Komputer'],
            ['name' => 'Bisnis Digital'],
        ]);
    }
}
