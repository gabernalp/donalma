<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActionAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('action_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('action_id');
            $table->foreign('action_id', 'action_fk_4915693')->references('id')->on('actions');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id', 'country_fk_4915695')->references('id')->on('countries');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id', 'department_fk_4915696')->references('id')->on('departments');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id', 'city_fk_4915697')->references('id')->on('cities');
        });
    }
}
