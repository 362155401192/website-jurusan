<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TargetRealisasi extends Model
{
    use HasFactory;

    protected $table = 'target_realisasis';

    protected $fillable = [
        'indikator_kinerja_kegiatan_id',
        'triwulan',
        'target',
        'realisasi',
        'file_pendukung',
    ];

    public function indikatorKinerjaKegiatan()
    {
        return $this->belongsTo(IndikatorKinerjaKegiatan::class, 'indikator_kinerja_kegiatan_id');
    }

    public static function boot()
    {
        parent::boot();

        static::saved(function ($tr) {
            if ($tr->indikator_kinerja_kegiatan_id) {
                $indikator = IndikatorKinerjaKegiatan::with('targetRealisasis')
                    ->find($tr->indikator_kinerja_kegiatan_id);

                if ($indikator) {
                    $totalTarget = $indikator->targetRealisasis->sum('target');
                    $totalRealisasi = $indikator->targetRealisasis->sum('realisasi');

                    $indikator->update([
                        'target_akhir' => $totalTarget,
                        'realisasi_akhir' => $totalRealisasi,
                    ]);
                }
            }
        });

        static::deleted(function ($tr) {
            if ($tr->indikator_kinerja_kegiatan_id) {
                $indikator = IndikatorKinerjaKegiatan::with('targetRealisasis')
                    ->find($tr->indikator_kinerja_kegiatan_id);

                if ($indikator) {
                    $totalTarget = $indikator->targetRealisasis->sum('target');
                    $totalRealisasi = $indikator->targetRealisasis->sum('realisasi');

                    $indikator->update([
                        'target_akhir' => $totalTarget,
                        'realisasi_akhir' => $totalRealisasi,
                    ]);
                }
            }
        });
    }

}
