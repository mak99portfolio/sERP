<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesChallansTable extends Migration{

    public function up(){

        Schema::create('sales_challans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sales_challan_no')->unique();
            $table->date('challan_date')->nullable();
            $table->integer('mushak_number_id')->unsigned()->nullable();
            $table->integer('delivery_person_id')->unsigned()->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mushak_number_id')->references('id')->on('mushak_numbers')->onDelete('cascade');
            $table->foreign('delivery_person_id')->references('id')->on('employee_profiles')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    public function down(){

        Schema::dropIfExists('sales_challans');

    }
}
