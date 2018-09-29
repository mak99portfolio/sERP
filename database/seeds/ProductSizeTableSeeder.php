<?php

use Illuminate\Database\Seeder;

class ProductSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data=[
        	['name'=>"12.00-20-18PR", 'short_name'=>'12.00-20-18PR', 'creator_user_id'=>1],
        	['name'=>"11.00-20-16PR", 'short_name'=>'11.00-20-16PR', 'creator_user_id'=>1],
        	['name'=>"10.00-20-16PR", 'short_name'=>'10.00-20-16PR', 'creator_user_id'=>1],
        	['name'=>"9.00-20-16PR", 'short_name'=>'9.00-20-16PR', 'creator_user_id'=>1],
        	['name'=>"8.25-20-14PR", 'short_name'=>'8.25-20-14PR', 'creator_user_id'=>1],
        	['name'=>"12R22.5-16PR", 'short_name'=>'12R22.5-16PR', 'creator_user_id'=>1],
        	['name'=>"11R22.5-16PR", 'short_name'=>'11R22.5-16PR', 'creator_user_id'=>1],
        	['name'=>"295/80R22.5-16PR", 'short_name'=>'295/80R22.5-16PR', 'creator_user_id'=>1],
        	['name'=>"12.00R20-18PR", 'short_name'=>'12.00R20-18PR', 'creator_user_id'=>1],
        	['name'=>"10.00R20-16PR", 'short_name'=>'10.00R20-16PR', 'creator_user_id'=>1],
        	['name'=>"9.00R20-14PR", 'short_name'=>'9.00R20-14PR', 'creator_user_id'=>1],
        	['name'=>"8.25R20-14PR", 'short_name'=>'8.25R20-14PR', 'creator_user_id'=>1],
        	['name'=>"10.00R20-16PR", 'short_name'=>'10.00R20-16PR', 'creator_user_id'=>1]
        ];

        \DB::table('product_sizes')->insert($data);

    }
}
