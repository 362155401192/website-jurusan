<?php

namespace App\Http\Controllers\Web\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Employee\EmployeeStatusRequest;
use App\Models\EmployeeStatus;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class EmployeeStatusController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Status Staff',
            'mods' => 'employee_status'
        ];

        return customView('employee_status.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(EmployeeStatus::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(EmployeeStatus $employeeStatus)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $employeeStatus
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(EmployeeStatusRequest $request)
    {
        try {
            EmployeeStatus::create($request->only(['name']));
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

    public function update(EmployeeStatusRequest $request, EmployeeStatus $employeeStatus)
    {
        try {
            $employeeStatus->update($request->only(['name']));
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

    public function destroy(EmployeeStatus $employeeStatus)
    {
        try {
            $employeeStatus->delete();
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
