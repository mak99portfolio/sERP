<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
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
                'name' => 'Shah Rakibur Rahman',
                'customer_type_id' => 1,
                'establishment_date' => '2018-12-30',
                'status' => 'Active',
                'customer_zone_id' => 1,
                'contact_number' => 01710244,
                'fax' => 'fax',
                'website' => 'website',
                'email' => 'email',
                'tin_number' => 'tin-123-456',
                'trade_license_number' => 'asd-465',
                'trade_license_issue_date' => '2018-08-12',
                'certificate_of_incorporation' => 'certificate of incorporation',
                'incorporation_date' => '2018-12-12',
                'vat_number' => 'vat-20187',
                'address' => 'address',
                'notes' => 'notes',
                'type_of_business' => 'type of business',
                'creator_user_id' => 1,
            ],
            [
                'name' => 'Shah Rakibur',
                'customer_type_id' => 2,
                'establishment_date' => '2018-12-30',
                'status' => 'Active',
                'customer_zone_id' => 1,
                'contact_number' => 10477412,
                'fax' => 'fax',
                'website' => 'website',
                'email' => 'email',
                'tin_number' => 'tin-4141-4141',
                'trade_license_number' => 'asd-786767',
                'trade_license_issue_date' => '2018-08-12',
                'certificate_of_incorporation' => 'certificate of incorporation',
                'incorporation_date' => '2018-12-12',
                'vat_number' => 'vat-20187',
                'address' => 'address',
                'notes' => 'notes',
                'type_of_business' => 'type of business',
                'creator_user_id' => 1,
            ],
        ];

        \DB::table('customers')->insert($data);

        $data = [
            [
                'account_number' => 'ac-123-456-789',
                'account_name' => 'Shah Rakibur',
                'bank_name' => 'DBBL',
                'branch' => 'Mirpur-1',
                'swift_code' => 'sw-123-56',
                'bank_address' => 'Shah Ali Bag',
                'customer_id' => 1,
            ],
            [
                'account_number' => 'ac-10-10-10',
                'account_name' => 'Shah Rakibur',
                'bank_name' => 'DBBL',
                'branch' => 'Mirpur-2',
                'swift_code' => 'sw-4141-414',
                'bank_address' => 'Shah Ali Dhaka',
                'customer_id' => 2,
            ],
        ];

        \DB::table('customer_banks')->insert($data);
        $data = [
            [
                'contact_name' => 'Rakibur',
                'designation' => 'designation',
                'contact_number' => '01919',
                'email' => 'email',
                'job_role' => 'job_role',
                'tell_number' => '123456789',
                'cell_number' => '852741558585',
                'customer_id' => 1,
            ],
            [
                'contact_name' => 'Rakibur',
                'designation' => 'designation',
                'contact_number' => '01919',
                'email' => 'email',
                'job_role' => 'job_role',
                'tell_number' => '123456789',
                'cell_number' => '852741558585',
                'customer_id' => 2,
            ]
        ];

        \DB::table('customer_contact_people')->insert($data);
        $data = [
            [
                'customer_id' => 1,
                'enclosure_id' => 1,
                'file_directory' => 'storage/',
                'file_name' => '1539754412-asd.csv',
            ],
            [
                'customer_id' => 2,
                'enclosure_id' => 1,
                'file_directory' => 'storage/',
                'file_name' => '1539754412-asd.csv',
            ]
        ];

        \DB::table('customer_enclosures')->insert($data);
    }
}
