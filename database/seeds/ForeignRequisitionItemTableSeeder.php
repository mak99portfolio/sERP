<?php

use Illuminate\Database\Seeder;

class ForeignRequisitionItemTableSeeder extends Seeder
{

    public function run()
    {
        $data=[
        	[
                'foreign_requisition_id'=>'1',
                'product_id'=>'1',
                'quantity'=>'10'
            ],
        	[
                'foreign_requisition_id'=>'1',
                'product_id'=>'2',
                'quantity'=>'20'
            ],
        	[
                'foreign_requisition_id'=>'1',
                'product_id'=>'3',
                'quantity'=>'30'
            ],
        	[
                'foreign_requisition_id'=>'2',
                'product_id'=>'1',
                'quantity'=>'30'
            ],
        	[
                'foreign_requisition_id'=>'2',
                'product_id'=>'2',
                'quantity'=>'50'
            ],
        	[
                'foreign_requisition_id'=>'2',
                'product_id'=>'4',
                'quantity'=>'40'
            ],
        	[
                'foreign_requisition_id'=>'2',
                'product_id'=>'3',
                'quantity'=>'30'
            ],
        	[
                'foreign_requisition_id'=>'3',
                'product_id'=>'1',
                'quantity'=>'60'
            ],
        	[
                'foreign_requisition_id'=>'3',
                'product_id'=>'2',
                'quantity'=>'70'
            ]
        ];

        \DB::table('foreign_requisition_items')->insert($data);
    }
}
