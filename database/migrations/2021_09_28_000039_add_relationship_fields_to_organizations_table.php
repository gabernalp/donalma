<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->unsignedBigInteger('dcoumenttype_id');
            $table->foreign('dcoumenttype_id', 'dcoumenttype_fk_4565179')->references('id')->on('document_types');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id', 'department_fk_4016452')->references('id')->on('departments');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id', 'city_fk_4016453')->references('id')->on('cities');
        });
    }
}
