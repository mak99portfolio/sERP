<?php

use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder{

    public function run(){
        
        $data=[
        	['id'=>1, 'product_categorie_id'=>1, 'name'=>'Oil', 'short_name'=>'BN','creator_user_id'=>1]
        ];

        \DB::table('product_categories')->insert($data);

    }

}
