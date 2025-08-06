<?php

namespace App\Http\Controllers\Web\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Employee\EmployeeRequest;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\EmployeeStatus;
use App\Models\EmployeeProgramStudi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;
use File;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Staff',
            'mods' => 'employee',
            'employeeTypes' => EmployeeType::all(),
            'employeeStatuses' => EmployeeStatus::all(),
            'employeeProgramStudis' => EmployeeProgramStudi::all(),
        ];

        return customView('employee.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(Employee::with(['employeeType', 'employeeStatus' ,'employeeProgramStudi'])->get())
            ->addColumn('employee_type', function ($data) {
                return $data->employeeType->name;
            })
            ->addColumn('employee_status', function ($data) {
                return $data->employeeStatus->name;
            })
            ->addColumn('employee_program_studi', function ($data) {
                return $data->employeeProgramStudi->name;
            })
            ->addColumn('hashid', function ($data) {
                return Hashids::encode($data->id);
            })
            ->make(true);
    }

    public function show(Employee $employee)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $employee,
                'employee_type' => Hashids::encode($employee->employee_type_id),
                'employee_status' => Hashids::encode($employee->employee_status_id),
                'employee_program_studi' => Hashids::encode($employee->employee_program_studi_id),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(EmployeeRequest $request)
    {
        try {
            $check = Employee::where('identity_number', $request->identity_number)->get();

            if ($check->count() > 0) {
                return response()->json([
                    'message' => 'Nomor identitas sudah digunakan',
                ], 500);
            }

            if ($request->hasFile('file')) {
                $picName = $this->uploadImage($request);
            } else {
                $picName = null;
            }

            $slug = Str::slug($request->name);

            Employee::create([
                'employee_type_id' => Hashids::decode($request->employee_type)[0],
                'employee_status_id' => Hashids::decode($request->employee_status)[0],
                'employee_program_studi_id' => Hashids::decode($request->employee_program_studi)[0],
                'user_id' => getInfoLogin()->id,
                'identity_number' => $request->identity_number,
                'name' => $request->name,
                'id_sdm' => $request->id_sdm,
                'slug' => $slug,
                'gender' => $request->gender,
                'image' => $picName
            ]);

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

    public function update(EmployeeRequest $request, Employee $employee)
    {
        try {
            if ($request->identity_number != $employee->identity_number) {
                $check = Employee::where('identity_number', $request->identity_number)->get();
                if ($check->count() > 0) {
                    return response()->json([
                        'message' => 'Nomor identitas sudah digunakan',
                    ], 500);
                }
            }

            if ($request->hasFile('file')) {
                File::delete(public_path('storage/images/employees/' . $employee->image));
                $picName = $this->uploadImage($request);
            } else {
                $picName = $employee->image;
            }

            $slug = Str::slug($request->name);

            $employee->update([
                'identity_number' => $request->identity_number,
                'name' => $request->name,
                'id_sdm' => $request->id_sdm,
                'slug' => $slug,
                'gender' => $request->gender,
                'employee_type_id' => Hashids::decode($request->employee_type)[0],
                'employee_status_id' => Hashids::decode($request->employee_status)[0],
                'employee_program_studi_id' => Hashids::decode($request->employee_program_studi)[0],
                'image' => $picName
            ]);

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

    public function destroy(Employee $employee)
    {
        try {
            if ($employee->image != null && file_exists(public_path('storage/images/employees/' . $employee->image))) {
                File::delete(public_path('storage/images/employees/' . $employee->image));
            }
            $employee->delete();
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

    private function uploadImage(Request $request)
    {
        $path = public_path('storage/images/employees');
        $file = $request->file('file');
        $filename = 'Employees_' . rand(0, 9999999999) . '_' . rand(0, 9999999999) . '.';
        $filename .= $file->getClientOriginalExtension();
        $file->move($path, $filename);
        return $filename;
    }
}
