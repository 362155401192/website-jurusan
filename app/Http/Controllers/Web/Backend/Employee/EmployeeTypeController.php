<?php

namespace App\Http\Controllers\Web\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Employee\EmployeeTypeRequest;
use App\Models\EmployeeType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class EmployeeTypeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jenis Staff',
            'mods' => 'employee_type'
        ];

        return customView('employee_type.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(EmployeeType::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(EmployeeType $employeeType)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $employeeType
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(EmployeeTypeRequest $request)
    {
        try {
            EmployeeType::create($request->only(['name']));
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

    public function update(EmployeeTypeRequest $request, EmployeeType $employeeType)
    {
        try {
            $employeeType->update($request->only(['name']));
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

    public function destroy(EmployeeType $employeeType)
    {
        try {
            $employeeType->delete();
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
