<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentType::insert([
            ['name' => 'Dokumen Penting'],
            ['name' => 'Dokumen Biasa'],
            ['name' => 'Dokumen Tidak Penting'],
            ['name' => 'Dokumen Sangat Penting'],
            ['name' => 'Dokumen Rahasia'],
        ]);
    }
}
