<?php

namespace App\Http\Controllers\Web\Backend\Achievement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Achievement\AchievementRequest;
use App\Models\Achievement;
use App\Models\AchievementType;
use App\Models\AchievementLevel;
use App\Models\AchievementProgramStudi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;
use File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AchievementController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Prestasi Mahasiswa',
            'mods' => 'achievement',
            'achievementTypes' => AchievementType::all(),
            'achievementLevels' => AchievementLevel::all(),
            'achievementProgramStudis' => AchievementProgramStudi::all()
        ];

        return customView('achievement.index', $data, 'backend');
    }


    public function getData()
    {
        return DataTables::of(
            Achievement::with(['achievementType', 'achievementLevel', 'achievementProgramStudi', 'user'])
        )
        ->addIndexColumn()
        ->addColumn('title', fn ($d) => $d->title ?? '-')
        ->addColumn('nim', fn ($d) => $d->nim ?? '-')
        ->addColumn('nama_mahasiswa', fn ($d) => $d->nama_mahasiswa ?? '-')
        ->addColumn('penyelenggara', fn ($d) => $d->penyelenggara ?? '-')
        ->addColumn('juara', fn ($d) => $d->juara ?? '-')
        ->addColumn('dosen_pembimbing', fn ($d) => $d->dosen_pembimbing ?? '-')
        ->addColumn('achievement_type', fn ($d) => $d->achievementType->name ?? '-')
        ->addColumn('achievement_level', fn ($d) => $d->achievementLevel->name ?? '-')
        ->addColumn('achievement_program_studi', fn ($d) => $d->achievementProgramStudi->name ?? '-')
        ->addColumn('location', fn ($d) => $d->location ?? '-')
        ->addColumn('date', fn ($d) => $d->date ?? '-')

            // Kolom image
            ->addColumn('image', function ($d) {
                if (!$d->image) return '-';
                $url = asset("storage/images/achievement/{$d->image}");
                return '<img src="' . e($url) . '" width="50">';
            })

            // Kolom sertifikat (link)
            ->addColumn('link_sertifikat', fn ($d) => $d->link_sertifikat)



            ->addColumn('is_publish', fn ($d) => $d->is_publish)
            ->addColumn('hashid', fn ($d) => Hashids::encode($d->id))

            // Kolom yang mengandung HTML
            ->rawColumns(['image', 'certificate', 'is_publish'])
            ->make(true);
    }


    public function store(AchievementRequest $request)
    {
        try {
            $achievement = new Achievement();
            $achievement->title = $request->title;
            $achievement->location = $request->location;
            $achievement->date = $request->date;
            $achievement->description = $request->description;
            $achievement->nim = $request->nim;
            $achievement->nama_mahasiswa = $request->nama_mahasiswa;
            $achievement->penyelenggara = $request->penyelenggara;
            $achievement->juara = $request->juara;
            $achievement->dosen_pembimbing = $request->dosen_pembimbing;
            $achievement->link_sertifikat = $request->link_sertifikat;

            $achievement->achievement_program_studi_id = Hashids::decode($request->achievement_program_studi_id)[0] ?? null;
            $achievement->achievement_level_id = Hashids::decode($request->achievement_level_id)[0] ?? null;
            $achievement->achievement_type_id = Hashids::decode($request->achievement_type_id)[0] ?? null;

            $achievement->user_id = Auth::id();

            // Upload file gambar jika ada
            if ($request->hasFile('file')) {
                $achievement->image = $this->uploadImage($request);
            }

            $achievement->save();

            return response()->json(['message' => 'Data berhasil disimpan.']);
        } catch (\Exception $e) {
            Log::error('Store Achievement Error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }




    public function show($id)
    {
        $decodedId = Hashids::decode($id);

        if (empty($decodedId)) {
            return response()->json(['message' => 'ID tidak valid'], 404);
        }

        $achievement = Achievement::with([
            'achievementType',
            'achievementLevel',
            'achievementProgramStudi',
            'user'
        ])->findOrFail($decodedId[0]);

        return response()->json([
            'success' => true,
            'data' => $achievement,
        ]);
    }


    public function update(AchievementRequest $request, $hashid)
    {
        try {
            $id = Hashids::decode($hashid)[0] ?? null;
            if (!$id) return response()->json(['message' => 'ID tidak valid'], 400);

            $achievement = Achievement::findOrFail($id);

            $image = $achievement->image;
            if ($request->hasFile('file')) {
                File::delete(public_path('storage/images/achievement/' . $achievement->image));
                $image = $this->uploadImage($request);
            }

            $achievement->update([
                'achievement_type_id' => Hashids::decode($request->achievement_type_id)[0],
                'achievement_level_id' => Hashids::decode($request->achievement_level_id)[0],
                'achievement_program_studi_id' => Hashids::decode($request->achievement_program_studi_id)[0],
                'title' => $request->title,
                'location' => $request->location,
                'date' => Carbon::parse($request->date)->format('Y-m-d'),
                'slug' => $request->slug ?? Str::slug($request->title),
                'image' => $image,
                'description' => $request->description,
                'nim' => $request->nim,
                'nama_mahasiswa' => $request->nama_mahasiswa,
                'penyelenggara' => $request->penyelenggara,
                'juara' => $request->juara,
                'dosen_pembimbing' => $request->dosen_pembimbing,
                'link_sertifikat' => $request->link_sertifikat,
            ]);


            return response()->json(['message' => 'Data berhasil diperbarui.']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }



    public function updateStatus($id)
    {
        try {
            $achievement = Achievement::findOrFail(Hashids::decode($id)[0]);

            $achievement->is_publish = !$achievement->is_publish;
            $achievement->save();

            return response()->json([
                'message' => 'Status berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }


    public function destroy($id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            return response()->json(['message' => 'ID tidak valid'], 400);
        }

        $achievement = Achievement::findOrFail($decoded[0]);
        $achievement->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }




    private function uploadImage(Request $request)
    {
        $path = public_path('storage/images/achievement');

        // Buat folder jika belum ada
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $image = $request->file('file');
        $filename = 'Achievements_' . uniqid() . '.' . $image->getClientOriginalExtension();

        $image->move($path, $filename);

        // Simpan hanya path relatif ke folder storage
        return 'images/achievement/' . $filename;
    }

}
