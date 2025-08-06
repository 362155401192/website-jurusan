<?php

namespace App\Http\Controllers\Web\Backend\Page; // Mengubah namespace

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Page\PageRequest; // Mengubah import request
use Illuminate\Http\Request;
use App\Models\Page; // Mengubah import model
use App\Models\Menu;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;
use File;

class PageController extends Controller // Mengubah nama class
{
    public function index()
    {
        $data = [
            'title' => 'Page',
            'mods' => 'page', // Mengubah modul
            'menus' => Menu::all(),
        ];
        return customView('page.index', $data, 'backend'); // Mengubah view
    }

    // public function getData()
    // {
    //     return DataTables::of(Page::query()) // Mengubah model
    //         ->addColumn('hashid', function ($data) {
    //             return Hashids::encode($data->id);
    //         })
    //         ->make(true);
    // }

    // public function getData()
    // {
    //     return DataTables::of(Page::with(['menuPage'])->get())
    //         ->addColumn('menu_page', function ($data) {
    //             return $data->menuPage->name;
    //         })
    //         ->make(true);
    // }

    public function getData()
    {
        return DataTables::of(Page::with(['menuPage'])->get())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->addColumn('menu_page', function ($data) {
            return $data->menuPage->name;
        })->make(true);
    }

    // public function show(Page $page) // Mengubah model
    // {
    //     try {
    //         return response()->json([
    //             'success' => true,
    //             'data' => $page,
    //         ]);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'message' => $e->getMessage(),
    //             'trace' => $e->getTrace()
    //         ]);
    //     }
    // }

    public function show(page $page)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $page,
                'menu_page' => Hashids::encode($page->menu_id),

            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }



    public function store(PageRequest $request) // Mengubah request
    {
        try {

            if ($request->hasFile('file')) {
                $picName = $this->uploadImage($request);
            } else {
                $picName = null;
            }

            Page::create([ // Mengubah model
                'menu_id' => Hashids::decode($request->menu_page)[0],
                'user_id' => auth()->id(),
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $request->slug,
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

    public function update(PageRequest $request, Page $page) // Mengubah request dan model
    {
        try {

            if ($request->hasFile('file')) {
                File::delete(public_path('storage/images/pages/' . $page->image));
                $picName = $this->uploadImage($request);
            } else {
                $picName = $page->image;
            }
            $page->update([ // Mengubah model
                'menu_id' => Hashids::decode($request->menu_page)[0],
                'user_id' => auth()->id(),
                'title' => $request->title,
                'content' => $request->content,
                'slug' => $request->slug,
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

    public function updateStatus(Page $page) // Mengubah model
    {
        if (\Request::ajax()) {
            try {
                $page->update(['is_publish' => $page->is_publish == true ? false : true, 'published_at' => Carbon::now()]);

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

    public function destroy(Page $page)
{
    try {
        if ($page->image != null && file_exists(public_path('storage/images/pages/' . $page->image))) {
            File::delete(public_path('storage/images/pages/' . $page->image));
        }
        $page->delete();
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
        $path = public_path('storage/images/pages');
        $file = $request->file('file');
        $filename = 'Pages_' . rand(0, 9999999999) . '_' . rand(0, 9999999999) . '.';
        $filename .= $file->getClientOriginalExtension();
        $file->move($path, $filename);
        return $filename;
    }


}

