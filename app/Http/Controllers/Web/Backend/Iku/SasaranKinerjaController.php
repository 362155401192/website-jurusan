<?php

namespace App\Http\Controllers\Web\Backend\Iku;

use App\Http\Controllers\Controller;
use App\Models\SasaranKinerja;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SasaranKinerjaController extends Controller
{
    public function index()
    {
        $title = 'Sasaran Kinerja';
        $mods = 'sasaran_kinerja'; // untuk load JS
        return view('backend.sasaran-kinerja.index', compact('title', 'mods'));
    }

    public function list(Request $request)
    {
        $data = SasaranKinerja::with([
            'indikatorKinerjaKegiatans.targetRealisasis'
        ])->get();

        if ($request->ajax()) {
            $data = SasaranKinerja::orderBy('kode')->get();

            return DataTables::of($data)
                ->addIndexColumn()
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
            'kode' => 'required|max:10',
            'nama' => 'required|string',
        ]);

        $sasaran = SasaranKinerja::updateOrCreate(
            ['id' => $request->id],
            ['kode' => $request->kode, 'nama' => $request->nama]
        );

        return response()->json(['status' => true, 'data' => $sasaran]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|max:10',
            'nama' => 'required|string',
        ]);

        $sasaran = SasaranKinerja::findOrFail($id);
        $sasaran->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return response()->json(['status' => true, 'data' => $sasaran]);
    }

    public function show($id)
    {
        $data = SasaranKinerja::findOrFail($id);
        return response()->json($data);
    }

    public function destroy($id)
    {
        $sasaran = SasaranKinerja::findOrFail($id);
        $sasaran->delete();

        return response()->json(['status' => true]);
    }

    /**
     * Generate daftar kode SK1 - SK10 untuk dropdown
     */
    public function kodeOptions()
    {
        $kodeList = [];
        for ($i = 1; $i <= 10; $i++) {
            $kodeList[] = 'SK' . $i;
        }

        return response()->json($kodeList);
    }
}
