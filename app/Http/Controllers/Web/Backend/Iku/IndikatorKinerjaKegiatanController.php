<?php

namespace App\Http\Controllers\Web\Backend\Iku;

use App\Http\Controllers\Controller;
use App\Models\SasaranKinerja;
use App\Models\IndikatorKinerjaKegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class IndikatorKinerjaKegiatanController extends Controller
{
    public function index()
    {
        $title = 'Indikator Kinerja Kegiatan';
        $mods = 'indikator_kinerja_kegiatan';
        $sasaran = SasaranKinerja::orderBy('nama')->get();
        return customView('indikator-kinerja-kegiatan.index', compact('title', 'mods', 'sasaran'), 'backend');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $query = IndikatorKinerjaKegiatan::with('sasaranKinerja')->orderBy('kode');

            if ($request->has('program_studi') && $request->program_studi != 'all') {
                $query->where('program_studi', $request->program_studi);
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('sasaran', function ($row) {
                    return $row->sasaranKinerja ? $row->sasaranKinerja->nama : '-';
                })
                ->addColumn('action', function ($row) {
                    return '
                    <button class="btn btn-outline-primary btn-sm" onclick="showForm(' . $row->id . ')"><i class="feather icon-edit"></i></button>
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteData(' . $row->id . ')"><i class="feather icon-trash-2"></i></button>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|max:10|unique:indikator_kinerja_kegiatans,kode,id',
            'deskripsi' => 'required|string',
            'sasaran_kinerja_id' => 'required|exists:sasaran_kinerjas,id',
            'target_akhir' => 'nullable|string',
            'realisasi_akhir' => 'nullable|string',
            'program_studi' => 'required|string',
        ],[
            'kode.unique' => 'Kode sudah digunakan',
        ]);

        $indikator = IndikatorKinerjaKegiatan::updateOrCreate(
            ['id' => $request->id],
            $request->only('kode', 'deskripsi', 'sasaran_kinerja_id', 'target_akhir', 'realisasi_akhir', 'program_studi')
        );

        return response()->json(['status' => true, 'data' => $indikator]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|max:10|unique:indikator_kinerja_kegiatans,kode,' . $id,
            'deskripsi' => 'required|string',
            'sasaran_kinerja_id' => 'required|exists:sasaran_kinerjas,id',
            'target_akhir' => 'nullable|string',
            'realisasi_akhir' => 'nullable|string',
            'program_studi' => 'required|string',
        ]);

        $indikator = IndikatorKinerjaKegiatan::findOrFail($id);

        $indikator->update($request->only(
            'kode',
            'deskripsi',
            'sasaran_kinerja_id',
            'target_akhir',
            'realisasi_akhir',
            'program_studi'
        ));

        return response()->json(['status' => true, 'data' => $indikator]);
    }


    public function show($id)
    {
        $data = IndikatorKinerjaKegiatan::findOrFail($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        $indikator = IndikatorKinerjaKegiatan::findOrFail($id);
        $indikator->delete();

        return response()->json(['status' => true]);
    }


    // public function kodeOptions()
    // {
    //     $kodeList = [
    //         'IKU 1.1',
    //         'IKU 1.2',
    //         'IKU 2.1',
    //         'IKU 2.2',
    //         'IKU 2.3',
    //         'IKU 3.1',
    //         'IKU 3.2',
    //         'IKU 3.3',
    //         'IKU 3.4'

    //     ];

    //     return response()->json($kodeList);

    // }

    public function lastCode()
    {
         $main = 1;
        $sub = 1;

        // Loop sampai ketemu kode yang belum ada
        while (true) {
            $newKode = "IKU {$main}.{$sub}";

            $exists = IndikatorKinerjaKegiatan::where('kode', $newKode)->exists();

            if (!$exists) {
                break;
            }

            $sub++;
        }

        return response()->json([
            'kode' => $newKode
        ]);
    }
}
