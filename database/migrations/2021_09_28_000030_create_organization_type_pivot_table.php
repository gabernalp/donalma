<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('organization_type', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id', 'organization_id_fk_4571548')->references('id')->on('organizations')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id', 'type_id_fk_4571548')->references('id')->on('types')->onDelete('cascade');
        });
    }
}
