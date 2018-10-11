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
                'commercial_invoice_no' => 1221,
                'date' => \Carbon\Carbon::now(),
                'letter_of_credit_id' => 1,
                'vessel_no' => 25,
                'port_of_loading_port_id' => 2,
                'port_of_discharge_port_id' => 1,
                'final_destination_city_id' => 1,
                'origin_of_goods_country_id' => 1,
                'final_destination_country_id' => 2,
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
                'vessel_no' => 15,
                'port_of_loading_port_id' => 1,
                'port_of_discharge_port_id' => 2,
                'final_destination_city_id' => 2,
                'origin_of_goods_country_id' => 2,
                'final_destination_country_id' => 1,
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
