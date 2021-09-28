<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('merchant')->nullable();
            $table->string('state_pol')->nullable();
            $table->string('response_code_pol')->nullable();
            $table->string('reference_sale')->nullable();
            $table->string('reference_pol')->nullable();
            $table->string('extra_1')->nullable();
            $table->string('extra_2')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_method_type')->nullable();
            $table->string('installments_number')->nullable();
            $table->string('value')->nullable();
            $table->string('tax')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('email_buyer')->nullable();
            $table->string('cus')->nullable();
            $table->string('pse_bank')->nullable();
            $table->string('description')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('account_number_ach')->nullable();
            $table->string('account_type_ach')->nullable();
            $table->string('administrative_fee')->nullable();
            $table->string('administrative_fee_base')->nullable();
            $table->string('administrative_fee_tax')->nullable();
            $table->string('authorization_code')->nullable();
            $table->string('bank')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('commision_pol')->nullable();
            $table->string('commision_pol_currency')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('date')->nullable();
            $table->string('ip')->nullable();
            $table->string('payment_methodid')->nullable();
            $table->string('payment_request_state')->nullable();
            $table->string('pse_reference_1')->nullable();
            $table->string('pse_reference_2')->nullable();
            $table->string('pse_reference_3')->nullable();
            $table->string('response_message_pol')->nullable();
            $table->string('transaction_bank')->nullable();
            $table->string('transaction')->nullable();
            $table->string('payment_method_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
