<?php

use Illuminate\Database\Seeder;

class EnclosureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[

            [
                'creator_user_id'=>1,
                'name'=>'Enclosure 1',
                'short_name'=>'E1'
            ],
            [
                'creator_user_id'=>1,
                'name'=>'Enclosure 2',
                'short_name'=>'E2'
            ],

            [
                'creator_user_id'=>1,
                'name'=>'Enclosure 3',
                'short_name'=>'E3'
            ]
        ];

        \DB::table('enclosures')->insert($data);
    }
}
