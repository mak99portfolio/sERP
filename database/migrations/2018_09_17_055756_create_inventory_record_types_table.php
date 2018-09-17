<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryRecordTypesTable extends Migration{

    public function up(){

        Schema::create('inventory_record_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('record_type_id')->nullable()->unique();
            $table->string('name')->unique();
            $table->string('short_name')->unique();
            $table->softDeletes();
            $table->timestamps();
        });

    }


    public function down(){

        Schema::dropIfExists('inventory_record_types');

    }

}
