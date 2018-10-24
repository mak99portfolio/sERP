<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCompanyIdToEmployeeOrgInfosTable extends Migration{

    public function up(){

        Schema::table('employee_org_infos', function (Blueprint $table) {

            $table->integer('company_id')->unsigned()->nullable()->after('employee_profile_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

        });

    }


    public function down(){

        Schema::table('employee_org_infos', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });

    }
}
