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
        	['creator_user_id'=>1, 'name'=>'SWIFT', 'short_name'=>'SW'],
        	['creator_user_id'=>1, 'name'=>'Stamp Charge', 'short_name'=>'SC']
        ];

        \DB::table('cost_particulars')->insert($data);
    }
}
