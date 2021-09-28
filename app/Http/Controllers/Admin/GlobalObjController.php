<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGlobalObjRequest;
use App\Http\Requests\StoreGlobalObjRequest;
use App\Http\Requests\UpdateGlobalObjRequest;
use App\Models\GlobalObj;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalObjController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('global_obj_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $globalObjs = GlobalObj::all();

        return view('admin.globalObjs.index', compact('globalObjs'));
    }

    public function create()
    {
        abort_if(Gate::denies('global_obj_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.globalObjs.create');
    }

    public function store(StoreGlobalObjRequest $request)
    {
        $globalObj = GlobalObj::create($request->all());

        return redirect()->route('admin.global-objs.index');
    }

    public function edit(GlobalObj $globalObj)
    {
        abort_if(Gate::denies('global_obj_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.globalObjs.edit', compact('globalObj'));
    }

    public function update(UpdateGlobalObjRequest $request, GlobalObj $globalObj)
    {
        $globalObj->update($request->all());

        return redirect()->route('admin.global-objs.index');
    }

    public function show(GlobalObj $globalObj)
    {
        abort_if(Gate::denies('global_obj_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.globalObjs.show', compact('globalObj'));
    }

    public function destroy(GlobalObj $globalObj)
    {
        abort_if(Gate::denies('global_obj_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $globalObj->delete();

        return back();
    }

    public function massDestroy(MassDestroyGlobalObjRequest $request)
    {
        GlobalObj::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
