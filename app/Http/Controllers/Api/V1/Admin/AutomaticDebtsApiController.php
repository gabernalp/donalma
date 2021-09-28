<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAutomaticDebtRequest;
use App\Http\Requests\UpdateAutomaticDebtRequest;
use App\Http\Resources\Admin\AutomaticDebtResource;
use App\Models\AutomaticDebt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutomaticDebtsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('automatic_debt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AutomaticDebtResource(AutomaticDebt::with(['transaction'])->get());
    }

    public function store(StoreAutomaticDebtRequest $request)
    {
        $automaticDebt = AutomaticDebt::create($request->all());

        return (new AutomaticDebtResource($automaticDebt))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AutomaticDebt $automaticDebt)
    {
        abort_if(Gate::denies('automatic_debt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AutomaticDebtResource($automaticDebt->load(['transaction']));
    }

    public function update(UpdateAutomaticDebtRequest $request, AutomaticDebt $automaticDebt)
    {
        $automaticDebt->update($request->all());

        return (new AutomaticDebtResource($automaticDebt))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AutomaticDebt $automaticDebt)
    {
        abort_if(Gate::denies('automatic_debt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $automaticDebt->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
