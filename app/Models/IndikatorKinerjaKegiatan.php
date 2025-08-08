<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndikatorKinerjaKegiatan extends Model
{
    use HasFactory;

    protected $table = 'indikator_kinerja_kegiatans';

    protected $fillable = [
        'sasaran_kinerja_id',
        'kode',
        'deskripsi',
        'target_akhir',
        'realisasi_akhir',
        'program_studi',
        'year'
    ];

    public function sasaranKinerja()
    {
        return $this->belongsTo(SasaranKinerja::class, 'sasaran_kinerja_id');
    }

    public function targetRealisasis()
    {
        return $this->hasMany(TargetRealisasi::class, 'indikator_kinerja_kegiatan_id');
    }
}
