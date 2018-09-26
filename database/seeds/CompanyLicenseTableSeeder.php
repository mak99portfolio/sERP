<?php

use Illuminate\Database\Seeder;

class CompanyLicenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'creator_user_id'=>1, 
                'license_no'=>'A34343', 
                'license_name'=>'Arif', 
                'renewed_date'=>'30-06-2018', 
                'expire_date'=>'30-12-2018', 
                'company_profile_id'=>'1'
            ]
        ];

        \DB::table('company_licenses')->insert($data);
    }
}
