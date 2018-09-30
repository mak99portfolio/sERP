<?php

use Illuminate\Database\Seeder;

class InsuranceCoverNoteTableSeeder extends Seeder
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
                'letter_of_credit_id' => 1,
                'insurance_cover_note_no' => 213213,
                'insurance_cover_note_date' => \Carbon\Carbon::now(),
                'vendor_id' => 1,
                'icn_bank_account_no' => 74720,
                'icn_bank_account_name' => 'Atik Khan',
                'icn_bank_name' => 'DBBL',
                'icn_bank_address' => 'Azimpur',
                'consignee_bank_account_no' => 95466520,
                'consignee_bank_account_name' => 'Maghnum',
                'consignee_bank_name' => 'Bank Asia',
                'consignee_bank_address' => 'Dhaka',
                'percent_of_marine' => 3,
                'amount_of_marine' => 24234,
                'percent_of_war' => 5,
                'amount_of_war' => 234234,
                'percent_of_net_premium' => 6,
                'amount_of_net_premium' => 23423,
                'percent_of_vat' => 2,
                'amount_of_vat' => 34543,
                'percent_of_stamp_duty' => 4,
                'amount_of_stamp_duty' => 45654,
                'company_id' => 1,
                'status' => 1,
                'creator_user_id' => 1,
                'note' => 'seeder 1',
            ],
            [
                'letter_of_credit_id' => 1,
                'insurance_cover_note_no' => 654213,
                'insurance_cover_note_date' => \Carbon\Carbon::now(),
                'vendor_id' => 2,
                'icn_bank_account_no' => 23423,
                'icn_bank_account_name' => 'Libon Khan',
                'icn_bank_name' => 'DBBL',
                'icn_bank_address' => 'Azimpur',
                'consignee_bank_account_no' => 234466520,
                'consignee_bank_account_name' => 'Maghnum',
                'consignee_bank_name' => 'Bank Asia',
                'consignee_bank_address' => 'Dhaka',
                'percent_of_marine' => 234,
                'amount_of_marine' => 345345,
                'percent_of_war' => 34,
                'amount_of_war' => 235345344234,
                'percent_of_net_premium' => 234,
                'amount_of_net_premium' => 2343453423,
                'percent_of_vat' => 3,
                'amount_of_vat' => 23423324234,
                'percent_of_stamp_duty' => 54,
                'amount_of_stamp_duty' => 435345,
                'company_id' => 1,
                'status' => 1,
                'creator_user_id' => 1,
                'note' => 'seeder 2',
            ]
        ];

        \DB::table('insurance_cover_notes')->insert($data);
    }
}
