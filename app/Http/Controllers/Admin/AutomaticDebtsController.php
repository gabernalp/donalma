<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAutomaticDebtRequest;
use App\Http\Requests\StoreAutomaticDebtRequest;
use App\Http\Requests\UpdateAutomaticDebtRequest;
use App\Models\AutomaticDebt;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutomaticDebtsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('automatic_debt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $automaticDebts = AutomaticDebt::with(['transaction'])->get();

        return view('admin.automaticDebts.index', compact('automaticDebts'));
    }

    public function create()
    {
        abort_if(Gate::denies('automatic_debt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::all()->pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.automaticDebts.create', compact('transactions'));
    }

    public function store(StoreAutomaticDebtRequest $request)
    {
        $automaticDebt = AutomaticDebt::create($request->all());

        return redirect()->route('admin.automatic-debts.index');
    }

    public function edit(AutomaticDebt $automaticDebt)
    {
        abort_if(Gate::denies('automatic_debt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::all()->pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $automaticDebt->load('transaction');

        return view('admin.automaticDebts.edit', compact('transactions', 'automaticDebt'));
    }

    public function update(UpdateAutomaticDebtRequest $request, AutomaticDebt $automaticDebt)
    {
        $automaticDebt->update($request->all());

        return redirect()->route('admin.automatic-debts.index');
    }

    public function show(AutomaticDebt $automaticDebt)
    {
        abort_if(Gate::denies('automatic_debt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $automaticDebt->load('transaction');

        return view('admin.automaticDebts.show', compact('automaticDebt'));
    }

    public function destroy(AutomaticDebt $automaticDebt)
    {
        abort_if(Gate::denies('automatic_debt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $automaticDebt->delete();

        return back();
    }

    public function massDestroy(MassDestroyAutomaticDebtRequest $request)
    {
        AutomaticDebt::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
