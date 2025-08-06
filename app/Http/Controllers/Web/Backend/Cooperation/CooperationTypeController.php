<?php

namespace App\Http\Controllers\Web\Backend\Cooperation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Cooperation\CooperationTypeRequest;
use App\Models\CooperationType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class CooperationTypeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jenis Kerjasama',
            'mods' => 'cooperation_type'
        ];

        return customView('cooperation_type.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(CooperationType::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(CooperationType $cooperationType)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $cooperationType
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(CooperationTypeRequest $request)
    {
        try {
            CooperationType::create($request->only(['name']));
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

    public function update(CooperationTypeRequest $request, CooperationType $cooperationType)
    {
        try {
            $cooperationType->update($request->only(['name']));
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

    public function destroy(CooperationType $cooperationType)
    {
        try {
            $cooperationType->delete();
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
