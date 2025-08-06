<?php

namespace App\Http\Controllers\Web\Backend\Document;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Document\DocumentRequest;
use App\Models\Document;
use App\Models\DocumentType;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;
use File;

class DocumentController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dokumen Arsip',
            'mods' => 'document',
            'documentTypes' => DocumentType::all()
        ];

        return customView('document.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(Document::with(['documentType'])->get())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->addColumn('document_type', function ($data) {
            return $data->documentType->name;
        })->make(true);
    }

    public function show(Document $document)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $document,
                'document_type' => Hashids::encode($document->document_type_id)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(DocumentRequest $request)
    {
        try {
            if ($request->hasFile('file')) {
                $document = $this->uploadImage($request);
            } else {
                $document = '-';
            }
            Document::create([
                'document_type_id' => Hashids::decode($request->document_type)[0],
                'user_id' => getInfoLogin()->id,
                'title' => $request->title,
                'file' => $document,
                'description' => $request->description,
                'link' => $request->link,
                'is_external_link' => true,
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

    public function update(DocumentRequest $request, Document $document)
    {
        try {
            if ($request->hasFile('file')) {
                File::delete(public_path('storage/documents/' . $document->file));
                $attachment = $this->uploadImage($request);
            } else {
                $attachment = $document->file;
            }
            $document->update([
                'document_type_id' => Hashids::decode($request->document_type)[0],
                'user_id' => getInfoLogin()->id,
                'title' => $request->title,
                'file' => $attachment,
                'description' => $request->description,
                'link' => $request->link,
                'is_external_link' => true,
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

    public function destroy(Document $document)
    {
        try {
            if ($document->file != null && file_exists(public_path('storage/documents/' . $document->file))) {
                File::delete(public_path('storage/documents/' . $document->file));
            }
            $document->delete();
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

    public function updateStatus(Document $document)
    {
        if (\Request::ajax()) {
            try {
                $document->update(['is_publish' => $document->is_publish == true ? false : true, 'published_at' => Carbon::now()]);

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
    private function uploadImage(Request $request)
    {
        $path = public_path('storage/documents');
        $file = $request->file('file');
        $filename = 'Document_' . rand(0, 9999999999) . '_' . rand(0, 9999999999) . '.';
        $filename .= $file->getClientOriginalExtension();
        $file->move($path, $filename);
        return $filename;
    }
}
