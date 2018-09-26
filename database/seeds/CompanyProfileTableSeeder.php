<?php

use Illuminate\Database\Seeder;

class CompanyProfileTableSeeder extends Seeder
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
                'name'=>'Arif Prival Ltd.',  
                'email'=>'a@gmail.com', 
                'phone'=>'01710355789', 
                'address'=>'Dhaka', 
                'country_id'=>'1',
                'creator_user_id'=>1
            ]
        ];

        \DB::table('company_profiles')->insert($data);
    }
}
