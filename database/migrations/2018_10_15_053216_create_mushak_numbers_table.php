<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMushakNumbersTable extends Migration{

    public function up(){

        Schema::create('mushak_numbers', function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('short_name')->unique();
            $table->string('number')->unique();
            $table->timestamps();
        });

    }

    public function down(){

        Schema::dropIfExists('mushak_numbers');

    }
}
