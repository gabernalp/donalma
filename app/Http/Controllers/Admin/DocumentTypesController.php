<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDocumentTypeRequest;
use App\Http\Requests\StoreDocumentTypeRequest;
use App\Http\Requests\UpdateDocumentTypeRequest;
use App\Models\DocumentType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('document_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentTypes = DocumentType::all();

        return view('admin.documentTypes.index', compact('documentTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('document_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentTypes.create');
    }

    public function store(StoreDocumentTypeRequest $request)
    {
        $documentType = DocumentType::create($request->all());

        return redirect()->route('admin.document-types.index');
    }

    public function edit(DocumentType $documentType)
    {
        abort_if(Gate::denies('document_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentTypes.edit', compact('documentType'));
    }

    public function update(UpdateDocumentTypeRequest $request, DocumentType $documentType)
    {
        $documentType->update($request->all());

        return redirect()->route('admin.document-types.index');
    }

    public function show(DocumentType $documentType)
    {
        abort_if(Gate::denies('document_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentType->load('documenttypeUsers');

        return view('admin.documentTypes.show', compact('documentType'));
    }

    public function destroy(DocumentType $documentType)
    {
        abort_if(Gate::denies('document_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentType->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentTypeRequest $request)
    {
        DocumentType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
