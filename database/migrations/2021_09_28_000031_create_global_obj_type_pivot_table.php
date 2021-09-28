<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalObjTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('global_obj_type', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id', 'type_id_fk_4699004')->references('id')->on('types')->onDelete('cascade');
            $table->unsignedBigInteger('global_obj_id');
            $table->foreign('global_obj_id', 'global_obj_id_fk_4699004')->references('id')->on('global_objs')->onDelete('cascade');
        });
    }
}
