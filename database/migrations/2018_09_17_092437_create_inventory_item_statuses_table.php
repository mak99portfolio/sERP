<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemStatusesTable extends Migration{

    public function up(){

        Schema::create('inventory_item_statuses', function (Blueprint $table){

            $table->increments('id');
            $table->string('name')->unique();
            $table->string('short_name')->unique();
            $table->softDeletes();
            $table->timestamps();

        });

    }


    public function down(){

        Schema::dropIfExists('inventory_item_statuses');

    }
}
