<?php

namespace App\Http\Controllers\Web\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Role $role)
    {
        $remappedPermission = [];
        $permissions = Permission::all();


        foreach ($permissions as $permission) {
            $explodePermissions = \explode('-', $permission->name);
            $slicePermissions = array_slice($explodePermissions, 1);
            $implodePermissions = \implode('-', $slicePermissions);
            $remappedPermission[$implodePermissions][] = $permission;
        }
        $data = [
            'title' => 'Edit Hak Akses ',
            'mods' => 'role',
            'role' => $role,
            'permissions' => $remappedPermission,
        ];

        return customView('role.permission', $data, 'backend');
    }

    public function changePermission(Request $request, Role $role)
    {
        try {
            $role->syncPermissions($request->permission);
            return response()->json([
                'message' => 'Permission berhasil di perbarui',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
