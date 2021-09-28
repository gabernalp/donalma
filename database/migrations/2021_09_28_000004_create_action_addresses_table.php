<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('action_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->longText('mapa')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
