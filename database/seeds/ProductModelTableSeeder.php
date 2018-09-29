<?php

use Illuminate\Database\Seeder;

class ProductModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['name'=>"SUPER LUG 78 ", 'short_name'=>'SUPER LUG 78 ', 'creator_user_id'=>1],
        	['name'=>"SUPER LUG 50+", 'short_name'=>'SUPER LUG 50+', 'creator_user_id'=>1],
        	['name'=>"SUPER MILER/SM99", 'short_name'=>'SUPER MILER/SM99', 'creator_user_id'=>1],
        	['name'=>"SUPER LUG 50+", 'short_name'=>'SUPER LUG 50+', 'creator_user_id'=>1],
        	['name'=>"SUPER LUG 50+R", 'short_name'=>'SUPER LUG 50+R', 'creator_user_id'=>1],
        	['name'=>"M77", 'short_name'=>'M77', 'creator_user_id'=>1],
        	['name'=>"SUPER MILER/SED", 'short_name'=>'SUPER MILER/SED', 'creator_user_id'=>1],
        	['name'=>"SUPER MILER/SM99", 'short_name'=>'SUPER MILER/SM99', 'creator_user_id'=>1],
        	['name'=>"SUPER LUG 78 ", 'short_name'=>'SUPER LUG 78 ', 'creator_user_id'=>1],
        	['name'=>"M77", 'short_name'=>'M77', 'creator_user_id'=>1],
        	['name'=>"SUPER MILER", 'short_name'=>'SUPER MILER', 'creator_user_id'=>1],
        	['name'=>"SUPER MILER/SM99", 'short_name'=>'SUPER MILER/SM99', 'creator_user_id'=>1],
        	['name'=>"SUPER LUG 78 ", 'short_name'=>'SUPER LUG 78 ', 'creator_user_id'=>1],
        	['name'=>"SUPER MILER", 'short_name'=>'SUPER MILER', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S1L6", 'short_name'=>'STEEL MUSCLE S1L6', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S1R4", 'short_name'=>'STEEL MUSCLE S1R4', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S1R4+", 'short_name'=>'STEEL MUSCLE S1R4+', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S1M4", 'short_name'=>'STEEL MUSCLE S1M4', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S1F4", 'short_name'=>'STEEL MUSCLE S1F4', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S1R4", 'short_name'=>'STEEL MUSCLE S1R4', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S1T4", 'short_name'=>'STEEL MUSCLE S1T4', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S1T4", 'short_name'=>'STEEL MUSCLE S1T4', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S1M4 PLUS", 'short_name'=>'STEEL MUSCLE S1M4 PLUS', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S3C8 PLUS", 'short_name'=>'STEEL MUSCLE S3C8 PLUS', 'creator_user_id'=>1],
        	['name'=>"STEEL MUSCLE S3H8 PLUS", 'short_name'=>'STEEL MUSCLE S3H8 PLUS', 'creator_user_id'=>1]
        ];

        \DB::table('product_models')->insert($data);

    }
}
