<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration{

    public function up(){

        Schema::create('stocks', function (Blueprint $table){

            $table->increments('id');
            $table->integer('working_unit_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('inventory_item_status_id')->unsigned()->nullable();
            $table->integer('inventory_item_pattern_id')->unsigned()->nullable();
            $table->integer('inventory_receive_id')->unsigned()->nullable();
            $table->integer('receive_quantity')->unsigned()->default(0);
            $table->integer('inventory_issue_id')->unsigned()->nullable();
            $table->integer('issue_quantity')->unsigned()->default(0);
            $table->integer('allocated_quantity')->unsigned()->default(0);
            $table->text('remarks')->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('working_unit_id')->references('id')->on('working_units')->onDelete('cascade');
            $table->foreign('inventory_item_status_id')->references('id')->on('inventory_item_statuses')->onDelete('cascade');
            $table->foreign('inventory_item_pattern_id')->references('id')->on('inventory_item_patterns')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('inventory_receive_id')->references('id')->on('inventory_receives')->onDelete('cascade');
            $table->foreign('inventory_issue_id')->references('id')->on('inventory_issues')->onDelete('cascade');

        });

    }

    public function down(){

        Schema::dropIfExists('stocks');

    }
}
