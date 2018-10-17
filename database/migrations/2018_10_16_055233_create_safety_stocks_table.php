<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSafetyStocksTable extends Migration{

    public function up(){

        Schema::create('safety_stocks', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('working_unit_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned();
            $table->integer('product_status_id')->unsigned()->nullable();
            $table->integer('product_type_id')->unsigned()->nullable();
            $table->integer('safety_quantity')->unsigned()->nullable();
            $table->integer('total_safety_quantity')->unsigned()->nullable();
            $table->timestamp('last_checked')->nullable();
            $table->integer('last_checked_stock')->unsigned()->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('product_status_id')->references('id')->on('product_statuses')->onDelete('cascade');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->foreign('working_unit_id')->references('id')->on('working_units')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');

        });

    }


    public function down(){

        Schema::dropIfExists('safety_stocks');

    }
}
