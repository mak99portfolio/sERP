<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeOrganizationalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_organizational_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_profile_id')->unsigned()->nullable();
            $table->foreign('employee_profile_id')->references('id')->on('employee_profiles')->onDelete('restrict');
            
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('designation_id')->unsigned()->nullable();
            $table->integer('working_unit_id')->unsigned()->nullable();
            $table->integer('employee_organizational_information_status_id')->unsigned()->nullable();
            $table->integer('employee_organizational_information_type_id')->unsigned()->nullable();
            $table->integer('creator_user_id')->unsigned()->nullable();
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('updator_user_id')->unsigned()->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('employee_organizational_informations');
    }
}
