<?php

use Illuminate\Database\Seeder;

class CommercialInvoiceTableSeeder extends Seeder
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
                'commercial_invoice_no' => 1111,
                'date' => \Carbon\Carbon::now(),
                'letter_of_credit_id' => 2,
                'bill_of_lading_no' => 452,
                'bill_of_lading_date' => \Carbon\Carbon::now(),
                'vessel_no' => 25,
                'container_no' => 28,
                'port_of_loading_port_id' => 2,
                'port_of_discharge_port_id' => 1,
                'destination_city_id' => 1,
                'country_goods_country_id' => 1,
                'destination_country_id' => 2,
                'notes' => 'Notes',
                'sub_total_quantity' => 243,
                'sub_total_amount' => 20000,
                'freight' => 200,
                'grand_total' => 20200
            ],
            [
                'commercial_invoice_no' => 1221,
                'date' => \Carbon\Carbon::now(),
                'letter_of_credit_id' => 1,
                'bl_no' => 452,
                'bl_date' => \Carbon\Carbon::now(),
                'vessel_no' => 25,
                'container_no' => 28,
                'port_of_loading_port_id' => 2,
                'port_of_discharge_port_id' => 1,
                'destination_city_id' => 1,
                'country_goods_country_id' => 1,
                'destination_country_id' => 2,
                'notes' => 'Notes 3',
                'sub_total_quantity' => 243,
                'sub_total_amount' => 200000,
                'freight' => 2000,
                'grand_total' => 2002000
            ],
            [
                'commercial_invoice_no' => 1122,
                'date' => \Carbon\Carbon::now(),
                'letter_of_credit_id' => 1,
                'bl_no' => 542,
                'bl_date' => \Carbon\Carbon::now(),
                'vessel_no' => 15,
                'container_no' => 248,
                'port_of_loading_port_id' => 1,
                'port_of_discharge_port_id' => 2,
                'destination_city_id' => 2,
                'country_goods_country_id' => 2,
                'destination_country_id' => 1,
                'notes' => 'Notes 2',
                'sub_total_quantity' => 43,
                'sub_total_amount' => 50000,
                'freight' => 300,
                'grand_total' => 50300
            ]
        ];

        \DB::table('commercial_invoices')->insert($data);
    }
}
