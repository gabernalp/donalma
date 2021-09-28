<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('documenttype_id')->nullable();
            $table->foreign('documenttype_id', 'documenttype_fk_4699024')->references('id')->on('document_types');
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->foreign('organization_id', 'organization_fk_4699022')->references('id')->on('organizations');
        });
    }
}
