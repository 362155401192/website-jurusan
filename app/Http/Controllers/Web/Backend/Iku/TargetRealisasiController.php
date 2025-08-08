<?php

namespace App\Http\Controllers\Web\Backend\Iku;

use App\Http\Controllers\Controller;
use App\Models\TargetRealisasi;
use App\Models\IndikatorKinerjaKegiatan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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


    public function getData(Request $request)
    {
        $query = IndikatorKinerjaKegiatan::with(['sasaranKinerja', 'targetRealisasis'])->get();
        $query = $query->filter(function ($indikator) {
            return $indikator->targetRealisasis->isNotEmpty();
        });
        $query =  $query->map(function ($indikator, $key) {
            $triwulan = [
                1 => ['target' => null, 'realisasi' => null],
                2 => ['target' => null, 'realisasi' => null],
                3 => ['target' => null, 'realisasi' => null],
            ];

            foreach ($indikator->targetRealisasis as $item) {
                $tw = (int)$item->triwulan;
                $triwulan[$tw] = [
                    'id' => $item->id,
                    'target' => $item->target,
                    'realisasi' => $item->realisasi,
                ];
            }
            return [
                'id' => $indikator->id,
                'kode' => $item ?? '-',
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
        return DataTables::of($query)->make(true);
    }




    public function store(Request $request)
    {
        $request->validate([
            'indikator_kinerja_kegiatan_id' => [
                'required',
                Rule::unique('target_realisasis')->where(function ($query) use ($request) {
                    return $query->where('triwulan', $request->triwulan);
                })
            ],
            'triwulan' => [
                'required',
                'integer',
                'min:1',
                'max:4',
                Rule::unique('target_realisasis')->where(function ($query) use ($request) {
                    return $query->where('indikator_kinerja_kegiatan_id', $request->indikator_kinerja_kegiatan_id);
                })
            ],
            'target' => 'required|numeric',
            'realisasi' => 'nullable|numeric',
            'file_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('file_pendukung')) {
            $path = $request->file('file_pendukung')->store('pendukung', 'public');
        }

        TargetRealisasi::create([
            'indikator_kinerja_kegiatan_id' => $request->indikator_kinerja_kegiatan_id,
            'triwulan' => $request->triwulan,
            'target' => $request->target,
            'realisasi' => $request->realisasi,
            'file_pendukung' => $path,
        ]);

        return response()->json(['message' => 'Data telah ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'indikator_kinerja_kegiatan_id' => [
                'required',
                Rule::unique('target_realisasis')->where(function ($query) use ($request) {
                    return $query->where('triwulan', $request->triwulan);
                })->ignore($id)
            ],
            'triwulan' => [
                'required',
                'integer',
                'min:1',
                'max:4',
                Rule::unique('target_realisasis')->where(function ($query) use ($request) {
                    return $query->where('indikator_kinerja_kegiatan_id', $request->indikator_kinerja_kegiatan_id);
                })->ignore($id)
            ],
            'target' => 'required|numeric',
            'realisasi' => 'nullable|numeric',
            'file_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        try {
            $target = TargetRealisasi::findOrFail($id);

            $path = null;
            if ($request->hasFile('file_pendukung')) {
                $path = $request->file('file_pendukung')->store('pendukung', 'public');
            } else {
                $path = $target->file_pendukung;
            }

            $target->update([
                'indikator_kinerja_kegiatan_id' => $request->indikator_kinerja_kegiatan_id,
                'triwulan' => $request->triwulan,
                'target' => $request->target,
                'realisasi' => $request->realisasi,
                'file_pendukung' => $path,
            ]);

            return response()->json([
                 'message' => 'Data telah ditambahkan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function show($id, Request $request)
    {
        $data = TargetRealisasi::findOrFail($id);
        return response()->json($data);
    }

    public function findByIndikatorTriwulan(Request $request)
    {
        $indikatorId = $request->input('indikator_kinerja_kegiatan_id');
        $triwulan = $request->input('triwulan');

        $data = TargetRealisasi::where('indikator_kinerja_kegiatan_id', $indikatorId)
                ->where('triwulan', $triwulan)
                ->first();

        return response()->json($data);
    }
    public function destroy($id)
    {
        $target = TargetRealisasi::where('indikator_kinerja_kegiatan_id',$id)->get();
        foreach ($target as $item) {
            $item->delete();
        }

        return response()->json(['status' => true]);
    }


}
