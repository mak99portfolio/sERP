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
                'commercial_invoice_no' => 1,
                'date' => \Carbon\Carbon::now(),
                'letter_of_credit_id' => 2,
                'bill_no' => 2,
                'bill_date' => \Carbon\Carbon::now(),
                'vessel_no' => 2,
                'container_no' => 2,
                'port_of_loading_port_id' => 2,
                'port_of_discharge_port_id' => 2,
                'destination_city_id' => 2,
                'country_goods_country_id' => 2,
                'destination_country_id' => 2,
                'notes' => 2,
                'sub_total_quantity' => 2,
                'sub_total_amount' => 20000,
                'freight' => 200,
                'grand_total' => 20200
            ]
        ];

        \DB::table('commercial_invoices')->insert($data);
    }
}
