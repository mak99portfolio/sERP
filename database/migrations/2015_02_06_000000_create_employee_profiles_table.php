<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_profiles', function (Blueprint $table){

            $table->increments('id');
            $table->string('employee_id');
            $table->string('name');
            $table->integer('blood_group_id')->unsigned();
            $table->string('nationality');
            $table->string('national_id');
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            
            //To give user access via login in associated modules
            $table->integer('user_id')->unsigned()->nullable();

            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_profiles');
    }
}
