<?php

namespace App\Http\Controllers\Web\Backend\Cooperation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Cooperation\CooperationFieldRequest;
use App\Models\CooperationField;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class CooperationFieldController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Bidang Kerjasama',
            'mods' => 'cooperation_field'
        ];

        return customView('cooperation_field.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(CooperationField::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(CooperationField $cooperationField)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $cooperationField
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(CooperationFieldRequest $request)
    {
        try {
            CooperationField::create($request->only(['name']));
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

    public function update(CooperationFieldRequest $request, CooperationField $cooperationField)
    {
        try {
            $cooperationField->update($request->only(['name']));
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

    public function destroy(CooperationField $cooperationField)
    {
        try {
            $cooperationField->delete();
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
