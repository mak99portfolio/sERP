<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnInEmployeeProfiles extends Migration{

    public function up(){

        Schema::table('employee_profiles', function (Blueprint $table){

            $table->renameColumn('employee_no', 'employee_id');

        });

    }

    public function down(){

        Schema::table('employee_profiles', function (Blueprint $table){

            $table->renameColumn('employee_id', 'employee_no');

        });

    }

}
