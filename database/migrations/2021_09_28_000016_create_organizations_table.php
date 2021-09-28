<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('nit')->unique();
            $table->string('legal_representant');
            $table->integer('document');
            $table->string('cargo');
            $table->string('address');
            $table->string('phone');
            $table->string('main_phone_ext')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('email');
            $table->string('finnancial_contact')->nullable();
            $table->string('finnancial_contact_email')->nullable();
            $table->integer('finnancial_contact_phone')->nullable();
            $table->string('finnancial_contact_ext')->nullable();
            $table->string('contracting_contact')->nullable();
            $table->string('contracting_contact_email')->nullable();
            $table->string('contracting_contact_phone')->nullable();
            $table->string('contracting_contact_ext')->nullable();
            $table->string('electronic_invoice_contact')->nullable();
            $table->string('electronic_invoice_email')->nullable();
            $table->integer('electronic_invoice_phone')->nullable();
            $table->string('electronic_invoice_ext')->nullable();
            $table->string('cash_banks_contact')->nullable();
            $table->string('cash_banks_email')->nullable();
            $table->integer('cash_banks_phone')->nullable();
            $table->string('cash_banks_ext')->nullable();
            $table->string('electronic_invoice_authorized_mail')->nullable();
            $table->string('requiere_orden_de_compra')->nullable();
            $table->integer('limit_day_to_invoice')->nullable();
            $table->boolean('national_tax_responsible')->default(0)->nullable();
            $table->boolean('local_tax_responsible')->default(0)->nullable();
            $table->float('local_tax_ammount', 15, 2)->nullable();
            $table->boolean('big_taxpayer')->default(0)->nullable();
            $table->string('big_taxpayer_resolution')->nullable();
            $table->boolean('seft_taxreteiner')->default(0)->nullable();
            $table->string('seft_taxreteiner_resolution')->nullable();
            $table->boolean('rst_tax')->default(0)->nullable();
            $table->boolean('donation_certificate_issuer')->default(0)->nullable();
            $table->string('payment_collection_time')->nullable();
            $table->boolean('disclaimer')->default(0)->nullable();
            $table->boolean('information_privacy_check')->default(0)->nullable();
            $table->string('bc_file')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->string('webpage')->nullable();
            $table->longText('embed_map')->nullable();
            $table->longText('embed_video')->nullable();
            $table->string('tags')->nullable();
            $table->string('status')->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->longText('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
