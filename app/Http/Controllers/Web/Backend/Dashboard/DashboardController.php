<?php

namespace App\Http\Controllers\Web\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\AchievementProgramStudi;
use App\Models\Employee;
use App\Models\SasaranKinerja;
use App\Models\IndikatorKinerjaKegiatan;
use App\Models\TargetRealisasi;
use App\Models\EmployeeType;

class DashboardController extends Controller
{
    public function index()
    {
        $grafik = $this->getGrafikIndikatorData();

        $prestasi_per_prodi = AchievementProgramStudi::withCount('achievements')->get();

        $jenis_staff = EmployeeType::withCount('employee')->get();
        $jumlah_staff_total = $jenis_staff->sum('employee_count');

        $data = [
            'title' => 'Dashboard',

            // Data Jumlah
            'jumlah_prestasi' => Achievement::count(),
            'jumlah_program_studi_prestasi' => AchievementProgramStudi::count(),
            'jumlah_dosen' => Employee::count(),
            'jumlah_indikator' => IndikatorKinerjaKegiatan::count(),

            // Grafik Indikator
            'grafik_labels' => $grafik['labels'],
            'grafik_target' => $grafik['target'],
            'grafik_realisasi' => $grafik['realisasi'],

            // Prestasi Per Prodi
            'prestasi_per_prodi' => $prestasi_per_prodi,

            // Staff Per Jenis
            'jenis_staff' => $jenis_staff,
            'jumlah_staff_total' => $jumlah_staff_total,
        ];

        return customView('dashboard.index', $data, 'backend');
    }


    private function getGrafikIndikatorData()
    {
        $data = \App\Models\IndikatorKinerjaKegiatan::select(
            'deskripsi',
            'target_akhir',
            'realisasi_akhir'
        )->get();

        $labels = [];
        $target = [];
        $realisasi = [];

        foreach ($data as $row) {
            $labels[] = $row->deskripsi;
            $target[] = round($row->target_akhir, 2);
            $realisasi[] = round($row->realisasi_akhir, 2);
        }

        return [
            'labels' => $labels,
            'target' => $target,
            'realisasi' => $realisasi,
        ];
    }

    public function chartData()
    {
        $data = SasaranKinerja::with([
            'indikatorKinerjaKegiatans.targetRealisasis'
        ])->get();

        $indikatorOptions = [];
        $chartDataset = [];

        foreach ($data as $sasaran) {
            foreach ($sasaran->indikatorKinerjaKegiatans as $indikator) {
                $triwulan = ['1' => 0, '2' => 0, '3' => 0];
                $triwulanRealisasi = ['1' => 0, '2' => 0, '3' => 0];

                foreach ($indikator->targetRealisasis as $target) {
                    $triwulan[$target->triwulan] = $target->target;
                    $triwulanRealisasi[$target->triwulan] = $target->realisasi;
                }

                $chartDataset[] = [
                    'id' => $indikator->id,
                    'indikator' => $indikator->deskripsi,
                    'triwulan_target' => array_values($triwulan),
                    'triwulan_realisasi' => array_values($triwulanRealisasi),
                    'target_akhir' => $indikator->target_akhir ?? 0,
                    'realisasi_akhir' => $indikator->realisasi_akhir ?? 0,
                ];

                $indikatorOptions[] = [
                    'id' => $indikator->id,
                    'label' => $indikator->deskripsi,
                ];
            }
        }

        return response()->json([
            'indikator_options' => $indikatorOptions,
            'data' => $chartDataset,
        ]);
    }
}
