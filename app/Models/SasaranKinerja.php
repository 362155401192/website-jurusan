<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SasaranKinerja extends Model
{
    use HasFactory;

    protected $table = 'sasaran_kinerjas';

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function indikatorKinerjaKegiatans()
    {
        return $this->hasMany(IndikatorKinerjaKegiatan::class, 'sasaran_kinerja_id');
    }
}
