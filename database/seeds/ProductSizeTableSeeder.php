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
        	['name'=>"10.00-20-16PR", 'short_name'=>'10.00-20-16PR', 'creator_user_id'=>1],
        	['name'=>"10.00-20FT", 'short_name'=>'10.00-20FT', 'creator_user_id'=>1],
        	['name'=>"11.00-20-16PR", 'short_name'=>'11.00-20-16PR', 'creator_user_id'=>1],
        	['name'=>"185-7014PR", 'short_name'=>'185-7014PR', 'creator_user_id'=>1],
        	['name'=>"7.00-15-12PR", 'short_name'=>'7.00-15-12PR', 'creator_user_id'=>1],
        	['name'=>"7.00-16-14PR", 'short_name'=>'7.00-16-14PR', 'creator_user_id'=>1],
        	['name'=>"7.50-16-14PR", 'short_name'=>'7.50-16-14PR', 'creator_user_id'=>1],
        	['name'=>"7.50-16", 'short_name'=>'7.50-16', 'creator_user_id'=>1],
        	['name'=>"8.25-16-16PR", 'short_name'=>'8.25-16-16PR', 'creator_user_id'=>1],
        	['name'=>"8.25-20-14PR", 'short_name'=>'8.25-20-14PR', 'creator_user_id'=>1],
        	['name'=>"8.25-20-16PR", 'short_name'=>'8.25-20-16PR', 'creator_user_id'=>1],
        	['name'=>"6.50-14-8PR", 'short_name'=>'6.50-14-8PR', 'creator_user_id'=>1],
			['name'=>"9.00-20-16PR", 'short_name'=>'9.00-20-16PR', 'creator_user_id'=>1],
			['name'=>"10.00-R20-16PR", 'short_name'=>'10.00R20-16PR', 'creator_user_id'=>1],
			['name'=>"11.00R20-16PR", 'short_name'=>'11.00R20-16PR', 'creator_user_id'=>1],
			['name'=>"11R22.5-16PR", 'short_name'=>'11R22.5-16PR', 'creator_user_id'=>1],
			['name'=>"12.00R20-18PR", 'short_name'=>'12.00R20-18PR', 'creator_user_id'=>1],
			['name'=>"12.00R20-18PR", 'short_name'=>'12.00R20-18PR', 'creator_user_id'=>1],
			['name'=>"12R22.5-18PR", 'short_name'=>'12R22.5-18PR', 'creator_user_id'=>1],
			['name'=>"155/80-8PR", 'short_name'=>'155/80-8PR', 'creator_user_id'=>1],
			['name'=>"155R13-8PR", 'short_name'=>'155R13-8PR', 'creator_user_id'=>1],
			['name'=>"295/80R22.5-16PR", 'short_name'=>'295/80R22.5-16PR', 'creator_user_id'=>1],
			['name'=>"8.25R20-16PR", 'short_name'=>'8.25R20-16PR', 'creator_user_id'=>1],
			['name'=>"9.00-R20-16PR", 'short_name'=>'9.00-R20-16PR', 'creator_user_id'=>1],

			['name'=>"208L", 'short_name'=>'208L', 'creator_user_id'=>1],
			['name'=>"20L", 'short_name'=>'20L', 'creator_user_id'=>1],
			['name'=>"4*5L", 'short_name'=>'4*5L', 'creator_user_id'=>1],
			['name'=>"12*1L", 'short_name'=>'12*1L', 'creator_user_id'=>1],
			['name'=>"6*4L", 'short_name'=>'6*4L', 'creator_user_id'=>1],
			['name'=>"24*500ml", 'short_name'=>'24*500ml', 'creator_user_id'=>1],
			['name'=>"24*355ML", 'short_name'=>'24*355ML', 'creator_user_id'=>1],
			['name'=>"15L", 'short_name'=>'15L', 'creator_user_id'=>1],
			['name'=>"8*2L", 'short_name'=>'8*2L', 'creator_user_id'=>1],
			['name'=>"24*600ML", 'short_name'=>'24*600ML', 'creator_user_id'=>1],
			['name'=>"18KG", 'short_name'=>'18KG', 'creator_user_id'=>1],
			['name'=>"24*500GM", 'short_name'=>'24*500GM', 'creator_user_id'=>1],
			['name'=>"180KG", 'short_name'=>'180KG', 'creator_user_id'=>1],
			['name'=>"24*1L", 'short_name'=>'24*1L', 'creator_user_id'=>1],
			['name'=>"4*4L", 'short_name'=>'4*4L', 'creator_user_id'=>1],
			['name'=>"17KG", 'short_name'=>'17KG', 'creator_user_id'=>1],
			['name'=>"0.5KG*12", 'short_name'=>'0.5KG*12', 'creator_user_id'=>1],
			['name'=>"1L*12", 'short_name'=>'1L*12', 'creator_user_id'=>1],
			['name'=>"24*400gm", 'short_name'=>'24*400gm', 'creator_user_id'=>1],
			['name'=>"24*400Gms", 'short_name'=>'24*400Gms', 'creator_user_id'=>1],
        ];

        \DB::table('product_sizes')->insert($data);

    }
}
