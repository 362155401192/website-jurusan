<?php

namespace App\Http\Controllers\Web\Backend\Iku;

use App\Http\Controllers\Controller;
use App\Models\TargetRealisasi;
use App\Models\IndikatorKinerjaKegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TargetRealisasiController extends Controller
{
    public function index()
    {
        $title = 'Target Realisasi';
        $mods = 'target_realisasi'; // untuk load JS custom

        $indikator = IndikatorKinerjaKegiatan::with('sasaranKinerja')
        ->orderBy('kode')
        ->get();

        return customView('target-realisasi.index', compact('title', 'mods', 'indikator'), 'backend');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            // Ambil semua indikator kinerja yang punya target realisasi
            $indikators = IndikatorKinerjaKegiatan::with(['sasaranKinerja', 'targetRealisasis'])->get();

            // Bentuk koleksi baru untuk keperluan tampilan datatables horizontal
            $data = $indikators->map(function ($indikator, $key) {
                $triwulan = [
                    1 => ['target' => null, 'realisasi' => null],
                    2 => ['target' => null, 'realisasi' => null],
                    3 => ['target' => null, 'realisasi' => null],
                ];

                foreach ($indikator->targetRealisasis as $item) {
                    $tw = (int)$item->triwulan;
                    $triwulan[$tw] = [
                        'target' => $item->target,
                        'realisasi' => $item->realisasi,
                    ];
                }

                return [
                    'id' => $indikator->id,
                    'sasaran' => $indikator->sasaranKinerja->nama ?? '-',
                    'indikator' => $indikator->deskripsi ?? '-',
                    'tw1_target' => $triwulan[1]['target'] ?? 0,
                    'tw1_realisasi' => $triwulan[1]['realisasi'] ?? 0,
                    'tw2_target' => $triwulan[2]['target'] ?? 0,
                    'tw2_realisasi' => $triwulan[2]['realisasi'] ?? 0,
                    'tw3_target' => $triwulan[3]['target'] ?? 0,
                    'tw3_realisasi' => $triwulan[3]['realisasi'] ?? 0,
                ];
            });

            return DataTables::of(collect($data))
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                    <button class="btn btn-outline-primary btn-sm" onclick="showForm(' . $row['id'] . ')"><i class="feather icon-edit"></i></button>
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteData(' . $row['id'] . ')"><i class="feather icon-trash-2"></i></button>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return abort(403);
    }




    public function store(Request $request)
    {
        $request->validate([
            'indikator_kinerja_kegiatan_id' => 'required|exists:indikator_kinerja_kegiatans,id',
            'triwulan' => 'required|integer|min:1|max:4',
            'target' => 'required|numeric',
            'realisasi' => 'nullable|numeric',
            'file_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Proses upload file jika ada
        $path = null;
        if ($request->hasFile('file_pendukung')) {
            $path = $request->file('file_pendukung')->store('pendukung', 'public');
        }

        // Simpan data ke database
        $target = \App\Models\TargetRealisasi::updateOrCreate(
            [
                'indikator_kinerja_kegiatan_id' => $request->indikator_kinerja_kegiatan_id,
                'triwulan' => $request->triwulan,
                'target' => $request->target,
                'realisasi' => $request->realisasi,
                'file_pendukung' => $path,
            ]
        );

        return response()->json(['status' => true, 'data' => $target]);
    }


    public function show($id)
    {
        $data = TargetRealisasi::findOrFail($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        $target = TargetRealisasi::findOrFail($id);
        $target->delete();

        return response()->json(['status' => true]);
    }

    public function updateInline(Request $request, $id)
    {
        $request->validate([
            'triwulan' => 'required|integer|in:1,2,3',
            'type' => 'required|in:target,realisasi',
            'value' => 'required|numeric'
        ]);

        $indikatorId = $id;
        $triwulan = $request->input('triwulan');
        $type = $request->input('type');
        $value = $request->input('value');

        $target = TargetRealisasi::firstOrNew([
            'indikator_kinerja_kegiatan_id' => $indikatorId,
            'triwulan' => $triwulan
        ]);

        $target->$type = $value;
        $target->save();

        return response()->json(['success' => true]);
    }


}

