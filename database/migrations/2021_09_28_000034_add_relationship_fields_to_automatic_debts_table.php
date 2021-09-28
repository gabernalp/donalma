<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAutomaticDebtsTable extends Migration
{
    public function up()
    {
        Schema::table('automatic_debts', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->foreign('transaction_id', 'transaction_fk_4016682')->references('id')->on('transactions');
        });
    }
}
