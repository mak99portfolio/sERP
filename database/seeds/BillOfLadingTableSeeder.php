<?php

use Illuminate\Database\Seeder;

class BillOfLadingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'bill_of_lading_no'=>146223,
                'bill_of_lading_date'=>'2018-10-09',
                'letter_of_credit_id'=>1,
                'letter_of_credit_date'=>'2018-10-09',
                'container_no' => 'CO-32123',
                'container_size' => 21,
                'number_of_box' => 52,
                'shipping_agency_vendor_id' => 1,
                'local_agency_vendor_id' => 2,
                'exporter_vendor_id' => 1,
                'letter_of_credit_id' => 1,
                'consignee_company_profile_id' => 1,
                'acceptance' => 'Janina',
                'port_of_loading_port_id' => 1,
                'port_of_discharge_port_id' => 2,
                'place_of_delivery' => 'Janina',
                'voyage_no' => 'voyage-24234',
                'place_of_transhipment' => 'mongla',
                'modes_of_transport_id' => 2,
                'move_type_id' => 1,
                'issue_place' => 'somewhere',
                'number_of_mtd' => '65465',
                'packaging_qty' => '5654',
                'gross_weight' => '45454',
                'creator_user_id' => 1,
            ],
        ];

        \DB::table('bill_of_ladings')->insert($data);

        \DB::table('bill_of_lading_items')->insert([
            [
               'bill_of_lading_id' => 1,
               'product_id' => 1,
               'quantity' => 200,
               'unit_price' => 20,
            ],
            [
                'bill_of_lading_id' => 1,
                'product_id' => 2,
                'quantity' => 90,
                'unit_price' => 540,
            ],
            [
                'bill_of_lading_id' => 1,
                'product_id' => 1,
                'quantity' => 32,
                'unit_price' => 545,
            ]
       ]);
        \DB::table('bill_of_lading_commercial_invoice')->insert([
            [
               'bill_of_lading_id' => 1,
               'commercial_invoice_id' => 1
            ]
       ]);
    }
}
