<?php

namespace App\Http\Controllers\Web\Backend\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Event\EventRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;
use File;


class EventController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Event dan Berita',
            'mods' => 'event',
        ];
        return customView('event.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(Event::query())
            ->addColumn('hashid', function ($data) {
                return Hashids::encode($data->id);
            })
            ->make(true);
    }

    public function show(Event $event)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $event,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(EventRequest $request)
    {
        try {
            $thumbnail = '-';

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $this->uploadThumbnail($request);
            }

            Event::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'thumbnail' => $thumbnail,
                'summary' => $request->summary,
                'content' => $request->content,
                'date' => $request->date,
                'slug' => $request->slug,
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

    public function update(EventRequest $request, Event $event)
    {
        try {
            $thumbnail = $event->thumbnail;

            if ($request->hasFile('thumbnail')) {
                File::delete(public_path('storage/images/events/' . $event->thumbnail));
                $thumbnail = $this->uploadThumbnail($request);
            }

            $event->update([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'thumbnail' => $thumbnail,
                'summary' => $request->summary,
                'content' => $request->content,
                'date' => $request->date,
                'slug' => $request->slug,

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

    public function updateStatus(Event $event)
{
    if (\Request::ajax()) {
        try {
            $event->update(['is_publish' => $event->is_publish == true ? false : true, 'published_at' => Carbon::now()]);

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

    public function destroy(Event $event)
    {
        try {
            if ($event->thumbnail != null && file_exists(public_path('storage/images/events/' . $event->thumbnail))) {
                File::delete(public_path('storage/images/events/' . $event->thumbnail));
            }
            $event->delete();
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

    private function uploadThumbnail(Request $request)
    {
        $path = public_path('storage/images/events/');
        $thumbnail = $request->file('thumbnail');
        $filename = 'Event_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move($path, $filename);
        return $filename;
    }
}


