<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryIssueItemsTable extends Migration{

    public function up(){

        Schema::create('inventory_issue_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventory_issue_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('inventory_item_status_id')->unsigned()->nullable();
            $table->integer('inventory_item_pattern_id')->unsigned()->nullable();
            $table->integer('requested_quantity')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('inventory_issue_id')->references('id')->on('inventory_issues')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('inventory_item_status_id')->references('id')->on('inventory_item_statuses')->onDelete('cascade');
            $table->foreign('inventory_item_pattern_id')->references('id')->on('inventory_item_patterns')->onDelete('cascade');
        });

    }


    public function down(){

        Schema::dropIfExists('inventory_issue_items');

    }
}
