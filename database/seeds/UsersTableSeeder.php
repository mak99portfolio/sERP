<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder{

    public function run(){

        $data=[
        	[     
                'name'=>'Shah Rakibur',
                'username'=>'libon123',
                'email'=>'swa@gmail.com',
                'password'=>bcrypt('12345678')
            ],
        	[
                'name'=>'Arif Khan',
                'username'=>'arif123',
                'email'=>'arif@gmail.com',
                'password'=>bcrypt('12345678')
            ],
        	[
                'name'=>'Asraful islam',
                'username'=>'asraful3161',
                'email'=>'asraful3161@gmail.com',
                'password'=>bcrypt('12345678')
            ],
        	[
                'name'=>'user',
                'username'=>'user',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('12345678')
            ],
        	[
                'name'=>'atiq',
                'username'=>'atiq123',
                'email'=>'atiq@gmail.com',
                'password'=>bcrypt('12345678')
            ],
        	[
                'name'=>'Mohammad Ali',
                'username'=>'ali123',
                'email'=>'mdali@gmail.com',
                'password'=>bcrypt('12345678')
            ]
        ];

        \DB::table('users')->insert($data);

    }

}
