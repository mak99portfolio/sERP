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

    	Schema::create('vendors', function (Blueprint $table){

            $table->increments('id');
            $table->string('vendor_id')->nullable();
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('trade_license_no')->nullable();
            $table->string('certificate_of_incorporation')->nullable();
            $table->string('vat_no')->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->string('establishment_date')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('vendor_category_id')->nullable();
            $table->string('telephone')->nullable();
            $table->string('website')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('trade_license_issue_date')->nullable();
            $table->string('incorporation_date')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_nature')->nullable();
            $table->string('credit_period')->nullable();
            $table->string('credit_limit')->nullable();
            $table->integer('creator_user_id')->unsigned();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();

        });

        Schema::create('vendor_payment_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->integer('net_days')->unsigned()->nullable();
            $table->decimal('payment_discount')->default(0.00)->nullable();
            $table->decimal('other_discount')->default(0.00)->nullable();
            $table->text('discount_terms')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

        });

        Schema::create('vendor_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->string('ac_no')->nullable();
            $table->string('ac_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('swift_code')->nullable();
            $table->text('address')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

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
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

        });

        Schema::create('enclosure_vendors', function (Blueprint $table){

            $table->increments('id');
            $table->integer('vendor_id')->unsigned();
            $table->integer('enclosure_id')->unsigned();
            $table->string('file_directory');
            $table->string('file_name');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('enclosure_id')->references('id')->on('enclosures')->onDelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enclosure_vendors');
        Schema::dropIfExists('vendor_contacts');
        Schema::dropIfExists('vendor_banks');
        Schema::dropIfExists('vendor_payment_terms');
        Schema::dropIfExists('vendors');
    }
}
