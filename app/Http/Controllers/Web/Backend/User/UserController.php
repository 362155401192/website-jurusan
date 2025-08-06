<?php

namespace App\Http\Controllers\Web\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\User\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use File;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'User',
            'mods' => 'user',
        ];

        return customView('user.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(User::whereHas('roles', function ($q) {
            $q->where('is_default', false);
        }))->addColumn('hashid', function ($data) {
            return $data->hashid;
        })->addColumn('role', function ($data) {
            return $data->getRoleNames()[0];
        })->make(true);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'action' => route('users.store'),
            'roles' => Role::where('is_default', false)->get(),
        ];

        return customView('user.form', $data, 'backend');
    }

    public function store(UserRequest $request)
    {
        try {
            if ($request->hasFile('file')) {
                $picName = $this->uploadImage($request);
            } else {
                $picName = null;
            }

            $request->merge(['password' => Hash::make($request->password), 'profile_photo_path' => $picName]);
            User::create($request->only(['name', 'email', 'username', 'password', 'profile_photo_path']))->assignRole($request->role);

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

    public function edit(User $user)
    {
        $data = [
            'title' => 'Edit User',
            'data' => $user,
            'action' => route('users.update', $user->hashid),
            'roles' => Role::where('is_default', false)->get(),
        ];

        return customView('user.form', $data, 'backend');
    }

    public function update(User $user, UserRequest $request)
    {
        try {
            if ($request->hasFile('file')) {
                $picName = null;

                if ($user->profile_photo_path != null && file_exists(public_path('storage/images/users/' . $user->profile_photo_path))) {
                    File::delete(public_path('storage/images/users/' . $user->profile_photo_path));
                    $picName = $this->uploadImage($request);
                }
            } else {
                $picName = null;
            }

            $request->merge(['profile_photo_path' => $picName]);
            $user->update($request->only(['name', 'username', 'email', 'profile_photo_path']));
            $user->syncRoles($request->role);

            return response()->json([
                'message' => 'Data telah diperbarui'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            if ($user->profile_photo_path != null && file_exists(public_path('storage/images/users/' . $user->profile_photo_path))) {
                File::delete(public_path('storage/images/users/' . $user->profile_photo_path));
            }

            $user->tokens->each->delete();
            $user->delete();

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
        $path = public_path('storage/images/users');
        $file = $request->file('file');
        $filename = 'Users_' . rand(0, 9999999999) . '_' . rand(0, 9999999999) . '.';
        $filename .= $file->getClientOriginalExtension();
        $file->move($path, $filename);
        return $filename;
    }

    public function updateStatus(User $user)
    {
        if (\Request::ajax()) {
            try {
                $user->update(['is_active' => $user->is_active == true ? false : true]);

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
