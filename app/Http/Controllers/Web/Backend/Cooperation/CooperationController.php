<?php

namespace App\Http\Controllers\Web\Backend\Cooperation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Cooperation\CooperationRequest;
use App\Models\Cooperation;
use App\Models\CooperationType; // Mengganti EmployeeType menjadi CooperationType
use App\Models\CooperationField; // Mengganti EmployeeStatus menjadi CooperationField
use App\Models\Partner;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;
use File;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CooperationController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kerjasama',
            'mods' => 'cooperation',
            'partners' => Partner::all(),
            'cooperationTypes' => CooperationType::all(), // Mengambil semua tipe kerjasama
            'cooperationFields' => CooperationField::all(),// Mengambil semua bidang kerjasama
        ];

        return customView('cooperation.index', $data, 'backend');
    }


    public function getData()
    {
        return DataTables::of(Cooperation::with(['cooperationType', 'cooperationField', 'partner'])->get())
            ->addColumn('cooperation_type', function ($data) {
                return $data->cooperationType->name;
            })
            ->addColumn('cooperation_field', function ($data) {
                return $data->cooperationField->name; // Mengambil nama bidang kerjasama
            })
            ->addColumn('partner_s', function ($data) {
                return $data->partner->name;
            })
            ->addColumn('hashid', function ($data) {
                return Hashids::encode($data->id);
            })
            ->make(true);
    }



    public function show(Cooperation $cooperation)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $cooperation,
                'partner_s' => Hashids::encode($cooperation->partner_id),
                'cooperation_type' => Hashids::encode($cooperation->cooperation_type_id),
                'cooperation_field' => Hashids::encode($cooperation->cooperation_field_id), // Mengambil id bidang kerjasama

            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }


    public function store(CooperationRequest $request)
    {
        try {
            // Membuat entri baru dalam tabel Cooperation
            Cooperation::create([
                'partner_id' => Hashids::decode($request->partner_s)[0],
                'cooperation_type_id' => Hashids::decode($request->cooperation_type)[0],
                'cooperation_field_id' => Hashids::decode($request->cooperation_field)[0],
                'user_id' => getInfoLogin()->id,
                'name' => $request->name,
                'link' => $request->link,
                'benefit' => $request->benefit,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end
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


public function update(CooperationRequest $request, Cooperation $cooperation)
{
    try {
        // Mengupdate data Cooperation yang sudah ada
        $cooperation->update([
            'partner_id' => Hashids::decode($request->partner_s)[0],
            'cooperation_type_id' => Hashids::decode($request->cooperation_type)[0],
            'cooperation_field_id' => Hashids::decode($request->cooperation_field)[0],
            'user_id' => getInfoLogin()->id,
            'name' => $request->name,
            'link' => $request->link,
            'benefit' => $request->benefit,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end
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



        public function destroy(Cooperation $cooperation)
    {
        try {
            // Menghapus data Cooperation
            $cooperation->delete();

            return response()->json([
                'message' => 'Data telah dihapus'
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

    public function updateStatus(Cooperation $cooperation)
{
    if (\Request::ajax()) {
        try {
            $cooperation->update(['is_publish' => $cooperation->is_publish == true ? false : true, 'published_at' => Carbon::now()]);

            return response()->json([
                'message' => 'Data telah diperbarui'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    } else {
        abort(403);
    }
}


}
