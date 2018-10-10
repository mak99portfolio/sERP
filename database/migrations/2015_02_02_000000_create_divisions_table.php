<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration{

    public function up(){

        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name')->unique();
            $table->integer('country_id')->unsigned();
            $table->integer('creator_user_id')->unsigned();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });

    }

    public function down(){

        Schema::dropIfExists('divisions');
        
    }
}
