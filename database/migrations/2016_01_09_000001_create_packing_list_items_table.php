<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackingListItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('packing_list_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packing_list_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('per_unit_weight');
            $table->integer('quantity');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('packing_list_items');
    }

}
