<?php

use Illuminate\Database\Seeder;

class ProductPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['id'=>1, 'name'=>"Finished", 'short_name'=>'FI', 'creator_user_id'=>1],
        	['id'=>2, 'name'=>"Sample", 'short_name'=>'SA', 'creator_user_id'=>1],
        	['id'=>3, 'name'=>"Gift", 'short_name'=>'GI', 'creator_user_id'=>1],
        	['id'=>4, 'name'=>"Other", 'short_name'=>'OT', 'creator_user_id'=>1],
        ];

        \DB::table('product_patterns')->insert($data);

    }
}
