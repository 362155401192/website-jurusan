<?php

namespace Database\Seeders;

use App\Models\EmployeeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeType::insert([
            ['name' => 'Dosen'],
            ['name' => 'Teknisi'],
            ['name' => 'Administrasi'],
        ]);
    }
}
