<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->integer('customer_type_id')->unsigned()->nullable();
            $table->foreign('customer_type_id')->references('id')->on('customer_types')->onDelete('cascade');
            $table->string('status')->nullable();
            $table->date('establishment_date')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('trade_license_number')->nullable();
            $table->date('trade_license_issue_date')->nullable();
            $table->string('certificate_of_incorporation')->nullable();
            $table->date('incorporation_date')->nullable();
            $table->string('vat_number')->nullable();
            $table->text('address')->nullable();
            $table->string('type_of_business')->nullable();
            $table->integer('creator_user_id')->unsigned();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_profiles');
    }
}
