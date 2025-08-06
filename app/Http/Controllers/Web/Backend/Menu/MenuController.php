<?php

namespace App\Http\Controllers\Web\Backend\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Menu\MenuRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;
use File;

class MenuController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Menu',
            'mods' => 'menu',
            'menus' => Menu::whereIn('level', ['1', '2'])->get()
        ];
        return customView('menu.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(Menu::query()->orderBy('id', 'asc'))
            ->addColumn('hashid', function ($data) {
                return Hashids::encode($data->id);
            })
            ->make(true);
    }


    public function show(Menu $menu)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $menu,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(MenuRequest $request)
    {
        try {

            Menu::create([
                // 'user_id' => auth()->id(),
                'name' => $request->name,
                'link' => $request->link,
                'order' => $request->order,
                'is_parent' => $request->is_parent,
                'parent' => $request->parent,
                'level' => $request->level,
                'link_target' => $request->link_target,
                'is_external_link' => $request->is_external_link,
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

    public function update(MenuRequest $request, Menu $menu)
    {
        try {


            $menu->update([
                 // 'user_id' => auth()->id(),
                 'name' => $request->name,
                 'link' => $request->link,
                 'order' => $request->order,
                 'is_parent' => $request->is_parent,
                 'parent' => $request->parent,
                 'level' => $request->level,
                 'link_target' => $request->link_target,
                 'is_external_link' => $request->is_external_link,
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

    public function updateStatus(Menu $menu)
    {
        if (\Request::ajax()) {
            try {
                $menu->update(['is_active' => $menu->is_active == true ? false : true,]);

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

   public function destroy(Menu $menu)
{
    try {
        $menu->delete();
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



// namespace App\Http\Controllers\Web\Backend\Menu;

// use App\Http\Controllers\Controller;
// use App\Models\Menu;
// use Illuminate\Http\Request;

// class MenuController extends Controller
// {
//     public function index()
//     {
//         $data = [
//             'title' => 'Menu',
//             'mods' => 'menu',
//             'menus' => Menu::whereIn('level', ['1', '2'])->get()
//         ];

//         return customView('menu.index', $data, 'backend');
//     }

//     public function updateStatus(Menu $menu)
//     {
//         if (\Request::ajax()) {
//             try {
//                 $menu->update(['is_active' => !$menu->is_active]);

//                 return response()->json([
//                     'message' => 'Data telah diperbarui'
//                 ]);
//             } catch (Exception $e) {
//                 return response()->json([
//                     'message' => $e->getMessage(),
//                     'trace' => $e->getTrace()
//                 ], 500);
//             }
//         } else {
//             abort(403);
//         }
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'name' => 'required|string|max:255',
//             'level' => 'required|in:1,2,3',
//             'parent_id' => 'nullable|exists:menus,id',
//             'is_active' => 'required|boolean'
//         ]);

//         try {
//             $menu = Menu::create($validatedData);

//             return response()->json([
//                 'message' => 'Menu baru berhasil ditambahkan',
//                 'menu' => $menu
//             ]);
//         } catch (Exception $e) {
//             return response()->json([
//                 'message' => $e->getMessage(),
//                 'trace' => $e->getTrace()
//             ], 500);
//         }
//     }
// }

