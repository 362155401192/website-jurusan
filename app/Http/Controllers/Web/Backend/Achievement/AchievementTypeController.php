<?php

namespace App\Http\Controllers\Web\Backend\Achievement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Achievement\AchievementTypeRequest;
use App\Models\AchievementType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class AchievementTypeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jenis Prestasi',
            'mods' => 'achievement_type'
        ];

        return customView('achievement_type.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(AchievementType::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(AchievementType $achievementType)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $achievementType
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(AchievementTypeRequest $request)
    {
        try {
            AchievementType::create($request->only(['name']));
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

    public function update(AchievementTypeRequest $request, AchievementType $achievementType)
    {
        try {
            $achievementType->update($request->only(['name']));
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

    public function destroy(AchievementType $achievementType)
    {
        try {
            $achievementType->delete();
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
