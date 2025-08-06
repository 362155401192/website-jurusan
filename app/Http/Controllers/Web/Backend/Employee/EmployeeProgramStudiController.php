<?php

namespace App\Http\Controllers\Web\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Employee\EmployeeProgramStudiRequest; // Ubah nama request
use App\Models\EmployeeProgramStudi; // Ubah model
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class EmployeeProgramStudiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Program Studi Staff',
            'mods' => 'employee_program_studi' // Ubah key sesuai dengan program studi
        ];

        return customView('employee_program_studi.index', $data, 'backend'); // Ubah view
    }

    public function getData()
    {
        return DataTables::of(EmployeeProgramStudi::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(EmployeeProgramStudi $employeeProgramStudi) // Ubah parameter
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $employeeProgramStudi
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(EmployeeProgramStudiRequest $request) // Ubah request
    {
        try {
            EmployeeProgramStudi::create($request->only(['name'])); // Ubah model
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

    public function update(EmployeeProgramStudiRequest $request, EmployeeProgramStudi $employeeProgramStudi) // Ubah parameter dan request
    {
        try {
            $employeeProgramStudi->update($request->only(['name'])); // Ubah model
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

    public function destroy(EmployeeProgramStudi $employeeProgramStudi) // Ubah parameter
    {
        try {
            $employeeProgramStudi->delete(); // Ubah model
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
