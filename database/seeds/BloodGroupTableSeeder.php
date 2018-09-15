<?php

use Illuminate\Database\Seeder;

class BloodGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['name'=>'A+', 'creator_user_id'=>1, 'updator_user_id'=>1],
        	['name'=>'A-', 'creator_user_id'=>1, 'updator_user_id'=>1],
        	['name'=>'B+', 'creator_user_id'=>1, 'updator_user_id'=>1],
        	['name'=>'B-', 'creator_user_id'=>1, 'updator_user_id'=>1],
        	['name'=>'AB+', 'creator_user_id'=>1, 'updator_user_id'=>1],
        	['name'=>'AB-', 'creator_user_id'=>1, 'updator_user_id'=>1],
        	['name'=>'O+', 'creator_user_id'=>1, 'updator_user_id'=>1],
        	['name'=>'O-', 'creator_user_id'=>1, 'updator_user_id'=>1]
        ];

        \DB::table('blood_groups')->insert($data);
    }
}
