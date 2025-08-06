<?php

namespace Database\Seeders;

use App\Models\EmployeeStatus;
use Illuminate\Database\Seeder;

class EmployeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeStatus::insert([
            ['name' => 'PNS'],
            ['name' => 'PPK'],
            ['name' => 'Kontrak'],
            ['name' => 'PNK'],
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}
