<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountGenericsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_generics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('discount_type');
            $table->double('discount_value');
            $table->boolean('active');
            $table->integer('creator_user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('discount_generics');
    }
}
