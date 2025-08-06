<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IndikatorKinerjaExport implements FromCollection, WithHeadings
{
    protected $data;
    protected $tahun;

    public function __construct(Collection $data, $tahun)
    {
        $this->data = $data;
        // $this->tahun = $tahun;
    }

    public function collection()
    {
        $rows = [];

        foreach ($this->data as $sasaran) {
            foreach ($sasaran->indikatorKinerjaKegiatans as $indikator) {
                $targets = collect($indikator->targetRealisasis)->where('tahun', $this->tahun);
                $get = fn ($tw) => $targets->firstWhere('triwulan', $tw);
                $totalTarget = $targets->sum('target');
                $totalRealisasi = $targets->sum('realisasi');

                $rows[] = [
                    'tahun' => $this->tahun,
                    'sasaran_kegiatan' => $sasaran->sasaran_kegiatan ?? '-',
                    'indikator_kinerja_kegiatan' => $indikator->indikator_kinerja_kegiatan ?? '-',
                    'triwulan_1_target' => $get(1)?->target ?? 0,
                    'triwulan_1_realisasi' => $get(1)?->realisasi ?? 0,
                    'triwulan_2_target' => $get(2)?->target ?? 0,
                    'triwulan_2_realisasi' => $get(2)?->realisasi ?? 0,
                    'triwulan_3_target' => $get(3)?->target ?? 0,
                    'triwulan_3_realisasi' => $get(3)?->realisasi ?? 0,
                    'target_akhir' => $totalTarget,
                    'realisasi_akhir' => $totalRealisasi,
                ];
            }
        }

        return collect($rows);
    }


    public function headings(): array
    {
        return [
            'Tahun',
            'Sasaran Kegiatan',
            'Indikator Kinerja Kegiatan',
            'Target TW1',
            'Realisasi TW1',
            'Target TW2',
            'Realisasi TW2',
            'Target TW3',
            'Realisasi TW3',
            'Target Akhir',
            'Realisasi Akhir',
        ];
    }
}

