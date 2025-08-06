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


}
