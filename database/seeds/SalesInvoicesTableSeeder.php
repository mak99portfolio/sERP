<?php

use Illuminate\Database\Seeder;

class SalesInvoicesTableSeeder extends Seeder{

    public function run(){
        
        $data=[
        	[
				'sales_invoice_no'=>'INV001',
				'sales_challan_id'=>1,
				'sales_invoice_status'=>'delivered',
				'sales_invoice_date'=>\Carbon\Carbon::now(),
				'invoice_address_id'=>1,
				'shipping_address_id'=>1,
				'delivery_person_id'=>1
        	],[
				'sales_invoice_no'=>'INV002',
				'sales_challan_id'=>1,
				'sales_invoice_status'=>'delivered',
				'sales_invoice_date'=>\Carbon\Carbon::now(),
				'invoice_address_id'=>1,
				'shipping_address_id'=>1,
				'delivery_person_id'=>1
        	],
        ];

    	\DB::table('sales_invoices')->insert($data);

    	$data=[
    		[
				'sales_invoice_id'=>1,
				'sales_challan_id'=>1,
				'sales_order_id'=>1,
				'product_id'=>1,
				'bonus_quantity'=>10,
				'invoice_quantity'=>30,
				'discount_amount'=>300
			],[
				'sales_invoice_id'=>2,
				'sales_challan_id'=>1,
				'sales_order_id'=>1,
				'product_id'=>1,
				'bonus_quantity'=>10,
				'invoice_quantity'=>30,
				'discount_amount'=>300
			],
    	];

    	\DB::table('sales_invoice_items')->insert($data);

    	$data=[
    		[
    			'sales_invoice_id'=>1,
    			'own_vehicle_id'=>1,
    		],
    	];

    	\DB::table('sales_invoice_vehicles')->insert($data);

    }

}
