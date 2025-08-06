<?php

namespace App\Http\Controllers\Web\Backend\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Partner\PartnerRequest;
use App\Models\Partner; // Ubah dari CooperationType ke Partner
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use File;
use Yajra\DataTables\DataTables;

class PartnerController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Industri',
            'mods' => 'partner' // Ubah dari cooperation_type ke partner
        ];

        return customView('partner.index', $data, 'backend'); // Ubah dari cooperation_type.index ke partner.index
    }

    public function getData()
    {
        return DataTables::of(Partner::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(Partner $partner) // Ubah dari CooperationType ke Partner
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $partner // Ubah dari CooperationType ke Partner
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(PartnerRequest $request)
    {
        try {
            // Memeriksa apakah nomor telepon sudah digunakan
            $check = Partner::where('phone_number', $request->phone_number)->get();

            if ($check->count() > 0) {
                return response()->json([
                    'message' => 'Nomor telepon sudah digunakan',
                ], 500);
            }

            // Upload gambar jika dimasukkan
            if ($request->hasFile('file')) {
                $picName = $this->uploadImage($request);
            } else {
                $picName = null;
            }

            // Membuat entri baru dalam tabel Partner
            Partner::create([
                'phone_number' => $request->phone_number, // Menggunakan phone_number sebagai ganti identity_number
                'name' => $request->name,
                'email' => $request->email, // Menambahkan email
                'address' => $request->address, // Menambahkan alamat
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



    public function update(PartnerRequest $request, Partner $partner)
    {
        try {
            // Periksa apakah nomor telepon berbeda dengan nomor telepon sebelumnya
            if ($request->phone_number != $partner->phone_number) {
                $check = Partner::where('phone_number', $request->phone_number)->get();
                if ($check->count() > 0) {
                    return response()->json([
                        'message' => 'Nomor telepon sudah digunakan',
                    ], 500);
                }
            }

            // Jika ada file yang diunggah, hapus gambar lama
            if ($request->hasFile('file')) {
                File::delete(public_path('storage/images/partner/' . $partner->image));
                $picName = $this->uploadImage($request);
            } else {
                $picName = $partner->image;
            }

            // Perbarui data partner
            $partner->update([
                'phone_number' => $request->phone_number,
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
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


    public function destroy(Partner $partner)
    {
        try {
            if ($partner->image != null && file_exists(public_path('storage/images/partner/' . $partner->image))) {
                File::delete(public_path('storage/images/partner/' . $partner->image));
            }
            $partner->delete();
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
    $path = public_path('storage/images/partner'); // Ubah direktori penyimpanan untuk mitra
    $file = $request->file('file');
    $filename = 'Partner_' . rand(0, 9999999999) . '_' . rand(0, 9999999999) . '.';
    $filename .= $file->getClientOriginalExtension();
    $file->move($path, $filename);
    return $filename;
}

}
