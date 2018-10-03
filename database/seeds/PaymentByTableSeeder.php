<?php

use Illuminate\Database\Seeder;

class PaymentByTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
        	['creator_user_id'=>1, 'name'=>'Purchase Order', 'short_name'=>'po'],
        	['creator_user_id'=>1, 'name'=>'Proforma Invoice', 'short_name'=>'pi'],
        	['creator_user_id'=>1, 'name'=>'Letter Of Credit', 'short_name'=>'lc'],
        	['creator_user_id'=>1, 'name'=>'Insurance Cover Note', 'short_name'=>'icn'],
        	['creator_user_id'=>1, 'name'=>'Commercial Invoice', 'short_name'=>'ci'],
        	['creator_user_id'=>1, 'name'=>'Bill Of Lading', 'short_name'=>'bol'],
        ];

        \DB::table('payment_bies')->insert($data);
    }
}
