<?php

use Illuminate\Database\Seeder;

class CostParticularTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'LC Margin', 'short_name'=>'LCM'],
        	['creator_user_id'=>1, 'name'=>'LC Commission', 'short_name'=>'LCC']
        ];

        \DB::table('cost_particulars')->insert($data);
    }
}
