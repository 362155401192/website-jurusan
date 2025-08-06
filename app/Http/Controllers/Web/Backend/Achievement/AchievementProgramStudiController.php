<?php

namespace App\Http\Controllers\Web\Backend\Achievement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Achievement\AchievementProgramStudiRequest;
use App\Models\AchievementProgramStudi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class AchievementProgramStudiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Program Studi',
            'mods' => 'achievement_program_studi'
        ];

        return customView('achievement_program_studi.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(AchievementProgramStudi::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(AchievementProgramStudi $achievementProgramStudi)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $achievementProgramStudi
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(AchievementProgramStudiRequest $request)
    {
        try {
            AchievementProgramStudi::create($request->only(['name']));
            return response()->json([
                'message' => 'Data telah ditambahkan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    public function update(AchievementProgramStudiRequest $request, AchievementProgramStudi $achievementProgramStudi)
    {
        try {
            $achievementProgramStudi->update($request->only(['name']));
            return response()->json([
                'message' => 'Data telah diubah'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    public function destroy(AchievementProgramStudi $achievementProgramStudi)
    {
        try {
            $achievementProgramStudi->delete();
            return response()->json([
                'message' => 'Data telah dihapus',
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return response()->json([
                    'message' => 'Data tidak dapat dihapus karena sudah digunakan',
                ], 500);
            } else {
                return response()->json([
                    'message' => $e->getMessage(),
                    'trace' => $e->getTrace()
                ], 500);
            }
        }
    }
}
