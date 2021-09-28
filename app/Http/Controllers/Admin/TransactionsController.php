<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TransactionsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Transaction::query()->select(sprintf('%s.*', (new Transaction())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'transaction_show';
                $editGate = 'transaction_edit';
                $deleteGate = 'transaction_delete';
                $crudRoutePart = 'transactions';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('merchant', function ($row) {
                return $row->merchant ? $row->merchant : '';
            });
            $table->editColumn('state_pol', function ($row) {
                return $row->state_pol ? $row->state_pol : '';
            });
            $table->editColumn('response_code_pol', function ($row) {
                return $row->response_code_pol ? $row->response_code_pol : '';
            });
            $table->editColumn('reference_sale', function ($row) {
                return $row->reference_sale ? $row->reference_sale : '';
            });
            $table->editColumn('reference_pol', function ($row) {
                return $row->reference_pol ? $row->reference_pol : '';
            });
            $table->editColumn('extra_1', function ($row) {
                return $row->extra_1 ? $row->extra_1 : '';
            });
            $table->editColumn('extra_2', function ($row) {
                return $row->extra_2 ? $row->extra_2 : '';
            });
            $table->editColumn('payment_method', function ($row) {
                return $row->payment_method ? $row->payment_method : '';
            });
            $table->editColumn('payment_method_type', function ($row) {
                return $row->payment_method_type ? $row->payment_method_type : '';
            });
            $table->editColumn('installments_number', function ($row) {
                return $row->installments_number ? $row->installments_number : '';
            });
            $table->editColumn('value', function ($row) {
                return $row->value ? $row->value : '';
            });
            $table->editColumn('tax', function ($row) {
                return $row->tax ? $row->tax : '';
            });
            $table->editColumn('transaction_date', function ($row) {
                return $row->transaction_date ? $row->transaction_date : '';
            });
            $table->editColumn('email_buyer', function ($row) {
                return $row->email_buyer ? $row->email_buyer : '';
            });
            $table->editColumn('cus', function ($row) {
                return $row->cus ? $row->cus : '';
            });
            $table->editColumn('pse_bank', function ($row) {
                return $row->pse_bank ? $row->pse_bank : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('billing_address', function ($row) {
                return $row->billing_address ? $row->billing_address : '';
            });
            $table->editColumn('shipping_address', function ($row) {
                return $row->shipping_address ? $row->shipping_address : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('account_number_ach', function ($row) {
                return $row->account_number_ach ? $row->account_number_ach : '';
            });
            $table->editColumn('account_type_ach', function ($row) {
                return $row->account_type_ach ? $row->account_type_ach : '';
            });
            $table->editColumn('administrative_fee', function ($row) {
                return $row->administrative_fee ? $row->administrative_fee : '';
            });
            $table->editColumn('administrative_fee_base', function ($row) {
                return $row->administrative_fee_base ? $row->administrative_fee_base : '';
            });
            $table->editColumn('administrative_fee_tax', function ($row) {
                return $row->administrative_fee_tax ? $row->administrative_fee_tax : '';
            });
            $table->editColumn('authorization_code', function ($row) {
                return $row->authorization_code ? $row->authorization_code : '';
            });
            $table->editColumn('bank', function ($row) {
                return $row->bank ? $row->bank : '';
            });
            $table->editColumn('billing_city', function ($row) {
                return $row->billing_city ? $row->billing_city : '';
            });
            $table->editColumn('billing_country', function ($row) {
                return $row->billing_country ? $row->billing_country : '';
            });
            $table->editColumn('commision_pol', function ($row) {
                return $row->commision_pol ? $row->commision_pol : '';
            });
            $table->editColumn('commision_pol_currency', function ($row) {
                return $row->commision_pol_currency ? $row->commision_pol_currency : '';
            });
            $table->editColumn('customer_number', function ($row) {
                return $row->customer_number ? $row->customer_number : '';
            });
            $table->editColumn('date', function ($row) {
                return $row->date ? $row->date : '';
            });
            $table->editColumn('ip', function ($row) {
                return $row->ip ? $row->ip : '';
            });
            $table->editColumn('payment_methodid', function ($row) {
                return $row->payment_methodid ? $row->payment_methodid : '';
            });
            $table->editColumn('payment_request_state', function ($row) {
                return $row->payment_request_state ? $row->payment_request_state : '';
            });
            $table->editColumn('pse_reference_1', function ($row) {
                return $row->pse_reference_1 ? $row->pse_reference_1 : '';
            });
            $table->editColumn('pse_reference_2', function ($row) {
                return $row->pse_reference_2 ? $row->pse_reference_2 : '';
            });
            $table->editColumn('pse_reference_3', function ($row) {
                return $row->pse_reference_3 ? $row->pse_reference_3 : '';
            });
            $table->editColumn('response_message_pol', function ($row) {
                return $row->response_message_pol ? $row->response_message_pol : '';
            });
            $table->editColumn('transaction_bank', function ($row) {
                return $row->transaction_bank ? $row->transaction_bank : '';
            });
            $table->editColumn('transaction', function ($row) {
                return $row->transaction ? $row->transaction : '';
            });
            $table->editColumn('payment_method_name', function ($row) {
                return $row->payment_method_name ? $row->payment_method_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.transactions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transactions.create');
    }

    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transactions.edit', compact('transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->load('transactionAutomaticDebts');

        return view('admin.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        Transaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
