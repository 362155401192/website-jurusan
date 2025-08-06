<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\SasaranKinerja;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SasaranKinerjaFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_membuat_sasaran_kinerja()
    {
        $response = $this->post('/sasaran-kinerja', [
            'kode' => 'SK001',
            'nama' => 'Peningkatan Mutu'
        ]);

        $response->assertStatus(302); // Redirect jika sukses
        $this->assertDatabaseHas('sasaran_kinerjas', [
            'kode' => 'SK001',
            'nama' => 'Peningkatan Mutu'
        ]);
    }
}

