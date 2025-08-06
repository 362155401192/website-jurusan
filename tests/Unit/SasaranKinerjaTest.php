<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\SasaranKinerja;

class SasaranKinerjaTest extends TestCase
{
    public function test_kode_bisa_diisi()
    {
        $model = new SasaranKinerja([
            'kode' => 'SK001',
            'nama' => 'Kinerja Mutu'
        ]);

        $this->assertEquals('SK001', $model->kode);
    }
}
