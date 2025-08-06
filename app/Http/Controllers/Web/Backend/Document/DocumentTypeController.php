<?php

namespace App\Http\Controllers\Web\Backend\Document;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Document\DocumentTypeRequest;
use App\Models\DocumentType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jenis Dokumen',
            'mods' => 'document_type'
        ];

        return customView('document_type.index', $data, 'backend');
    }

    public function getData()
    {
        return DataTables::of(DocumentType::query())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make(true);
    }

    public function show(DocumentType $documentType)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $documentType
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function store(DocumentTypeRequest $request)
    {
        try {
            DocumentType::create($request->only(['name']));
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

    public function update(DocumentTypeRequest $request, DocumentType $documentType)
    {
        try {
            $documentType->update($request->only(['name']));
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

    public function destroy(DocumentType $documentType)
    {
        try {
            $documentType->delete();
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
