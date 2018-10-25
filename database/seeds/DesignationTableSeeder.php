<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder{

    public function run(){

        $data=[
        	[
                'designation_no'=>'DG1',
                'name'=>'Managing Director & CEO',
                'short_name'=>'Managing Director & CEO'
            ],
        	[
                'designation_no'=>'DG2',
                'name'=>'Director-HR',
                'short_name'=>'Director-HR'
            ],
        	[
                'designation_no'=>'DG3' ,
                'name'=>'CFO',
                'short_name'=>'CFO'
            ],
        	[
                'designation_no'=>'DG4' ,'name'=>'Manager-Finance & Operation', 'short_name'=>'Manager-Finance & Operation'],
        	[
                'designation_no'=>'DG5' ,'name'=>'Officer-Accounts & Commercial', 'short_name'=>'Officer-Accounts & Commercial'],
        	[
                'designation_no'=>'DG6' ,'name'=>'officer-accounts', 'short_name'=>'officer-accounts'],
        	[
                'designation_no'=>'DG7' ,'name'=>'Manager', 'short_name'=>'Manager'],
        	[
                'designation_no'=>'DG8' ,'name'=>'Asst. Manager', 'short_name'=>'Asst. Manager'],
        	[
                'designation_no'=>'DG9' ,'name'=>'Sr. Officer', 'short_name'=>'Sr. Officer'],
        	[
                'designation_no'=>'DG10' ,'name'=>'Officer', 'short_name'=>'Officer'],
        	[
                'designation_no'=>'DG11' ,'name'=>'Sr. Liaison OfficerAdmin & Audit', 'short_name'=>'Sr. Liaison OfficerAdmin & Audit'],
        	[
                'designation_no'=>'DG12' ,'name'=>'Sr. Officer-Warehouse & Logistic', 'short_name'=>'Sr. Officer-Warehouse & Logistic'],
        	[
                'designation_no'=>'DG13' ,'name'=>'Officer-Warehouse & Logistic', 'short_name'=>'Officer-Warehouse & Logistic'],
        	[
                'designation_no'=>'DG14' ,'name'=>'Officer-VAT & TAX', 'short_name'=>'Officer-VAT & TAX'],
        	[
                'designation_no'=>'DG15' ,'name'=>'IT Officer', 'short_name'=>'IT Officer'],
        	[
                'designation_no'=>'DG16' ,'name'=>'Asst. Officer-Warehouse & Logistic', 'short_name'=>'Asst. Officer-Warehouse & Logistic'],
        	[
                'designation_no'=>'DG17' ,'name'=>'Office Attendant', 'short_name'=>'Office Attendant'],
        	[
                'designation_no'=>'DG18' ,'name'=>'Driver', 'short_name'=>'Driver'],
        	[
                'designation_no'=>'DG19' ,'name'=>'Caretaker', 'short_name'=>'Caretaker'],
        	[
                'designation_no'=>'DG20' ,'name'=>'Labour', 'short_name'=>'Labour'],
        	[
                'designation_no'=>'DG21' ,'name'=>'Security Guard', 'short_name'=>'Security Guard'],
        	[
                'designation_no'=>'DG22' ,'name'=>'Cook', 'short_name'=>'Cook'],
            [
                'designation_no'=>'DG23' ,'name'=>'Cleaner', 'short_name'=>'Cleaner'],
        	[
                'designation_no'=>'DG24' ,'name'=>'Leagal Adviser & Customer Co-Ordinator', 'short_name'=>'Leagal Adviser & Customer Co-Ordinator'
            ],[
                'designation_no'=>'DG25' ,'name'=>'Peon', 'short_name'=>'Peon'
            ],[
                'designation_no'=>'DG26',
                'name'=>'Depo Admin',
                'short_name'=>'DA'
            ],[
                'designation_no'=>'DG27',
                'name'=>'Depo User',
                'short_name'=>'DU'
            ],
        ];

        \DB::table('designations')->insert($data);

    }

}
