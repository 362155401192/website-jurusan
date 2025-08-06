<?php

namespace App\Http\Controllers\Web\Backend\Achievement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Achievement\AchievementLevelRequest;
use App\Models\AchievementLevel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class AchievementLevelController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Tingkat Prestasi',
            'mods' => 'achievement_level'
        ];

        return customView('achievement_level.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(AchievementLevel::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(AchievementLevel $achievementLevel)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $achievementLevel
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(AchievementLevelRequest $request)
    {
        try {
            AchievementLevel::create($request->only(['name']));
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

    public function update(AchievementLevelRequest $request, AchievementLevel $achievementLevel)
    {
        try {
            $achievementLevel->update($request->only(['name']));
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

    public function destroy(AchievementLevel $achievementLevel)
    {
        try {
            $achievementLevel->delete();
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
