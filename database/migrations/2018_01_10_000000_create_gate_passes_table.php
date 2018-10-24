<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatePassesTable extends Migration{

    public function up(){

        Schema::create('gate_passes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gate_pass_no')->unique();
            $table->string('name')->unique();
            $table->string('short_name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

    }


    public function down(){

        Schema::dropIfExists('gate_passes');

    }
}
