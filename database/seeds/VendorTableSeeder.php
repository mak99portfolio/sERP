<?php

use Illuminate\Database\Seeder;
class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1=[
        	[
                'creator_user_id'=>1,
                'name'=>'MRF',
                'vendor_id'=>'123456789',
                'status_id'=>'1',
                'establishment_date'=> \Carbon\Carbon::now(),
                'country_id'=>'2',
                'vendor_category_id'=>'2',
                'zip_code'=>'1205',
                'telephone'=>'25698451',
                'fax'=>'fax-2156',
                'website'=>'mrf.com',
                'email'=>'mrf@gmail.com',
                'tin_no'=>'tin-551546',
                'trade_license_no'=>'trade-5985464',
                'trade_license_issue_date'=> \Carbon\Carbon::now(),
                'certificate_of_incorporation'=>'certificate',
                'incorporation_date'=> \Carbon\Carbon::now(),
                'vat_no'=>'vat-98845646',
                'business_type'=>'Ltd. Company',
                'business_nature'=>'Service Provide',
                'credit_period'=>'3',
                'credit_limit'=>'500000',
                'address'=>'Kolkata'
            ]
        ];

        $data2=[
        	[
                'vendor_id'=>'1',
                'net_days'=>'15',
                'payment_discount'=>'5',
                'other_discount'=>'0',
                'discount_terms'=>'nothing'
            ]
        ];

        $data3 = [
            [
               'vendor_id' => '1',
                'ac_no' => 'AC-0016568984',
                'ac_name' => 'MRF Account',
                'bank_name' => 'LIC Bank',
                'branch_name' => 'Kolkata branch',
                'swift_code' => 'LIC-123',
                'address' => 'Kolkata',
            ]
        ];

        $data4 = [
            [
               'vendor_id' => '1',
               'name'=> 'Libon Khan',
               'designation'=> 'Software Engineer',
               'telephone'=> '20155656',
               'email'=> 'libon@gmail.com',
               'role'=> 'Laravel Developer',
               'mobile'=> '01956974156'
            ]
        ];


        \DB::table('vendors')->insert($data1);
        \DB::table('vendor_payment_terms')->insert($data2);
        \DB::table('vendor_banks')->insert($data3);
        \DB::table('vendor_contacts')->insert($data4);
    }
}
