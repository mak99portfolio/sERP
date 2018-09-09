<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('payment_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->integer('net_days')->unsigned();
            $table->decimal('payment_discount')->default(0.00);
            $table->decimal('other_discount')->default(0.00);
            $table->text('discount_terms')->nullable();
            $table->timestamps();

        });

        Schema::create('bank_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ac_no')->nullable();
            $table->string('ac_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('swift_code')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();

        });

        Schema::create('vendors', function (Blueprint $table){

            $table->increments('id');
            $table->string('vendor_id')->unique();
            $table->string('name');
            $table->text('address');
            $table->string('zip_code');
            $table->string('fax');
            $table->string('email');
            $table->string('trade_license_no');
            $table->string('certificate_of_incorporation');
            $table->string('vat_no');
            $table->integer('status_id')->unsigned();
            $table->date('establishment_date');
            $table->string('country');
            $table->integer('vendor_category_id');
            $table->string('telephone');
            $table->string('website');
            $table->string('tin_no');
            $table->date('trade_license_issue_date');
            $table->date('incorporation_date');
            $table->string('business_type');
            $table->string('business_nature');
            $table->string('credit_period');
            $table->string('credit_limit');
            $table->integer('payment_term_id');
            $table->integer('bank_information_id');
            $table->timestamps();

            $table->foreign('payment_term_id')->references('id')->on('payment_terms')->onDelete('cascade');
            $table->foreign('bank_information_id')->references('id')->on('bank_information')->onDelete('cascade');

        });

        Schema::create('vendor_contacts', function (Blueprint $table){

            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('role')->nullable();
            $table->text('mobile')->nullable();
            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

        });

        Schema::create('vendor_enclosures', function (Blueprint $table){
        	
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();

        });

        Schema::create('enclosure_vendor', function (Blueprint $table){
        	
            $table->increments('id');
            $table->integer('enclosure_id');
            $table->integer('vendor_id');
            
            $table->foreign('enclosure_id')->references('id')->on('vendor_enclosures')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enclosure_vendor');
        Schema::dropIfExists('vendor_enclosures');
        Schema::dropIfExists('vendor_contacts');
        Schema::dropIfExists('vendors');
        Schema::dropIfExists('bank_information');
        Schema::dropIfExists('payment_terms');
    }
}
