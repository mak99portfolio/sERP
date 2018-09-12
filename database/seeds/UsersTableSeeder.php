<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder{

    public function run(){

        $data=[
        	['name'=>'Shah Rakibur', 'email'=>'swa@gmail.com', 'password'=>bcrypt('12345678')],
        	['name'=>'Arif Khan', 'email'=>'arif@gmail.com', 'password'=>bcrypt('12345678')],
        	['name'=>'Asraful islam', 'email'=>'asraful3161@gmail.com', 'password'=>bcrypt('12345678')],
        	['name'=>'user', 'email'=>'user@gmail.com', 'password'=>bcrypt('12345678')],
        	['name'=>'atiq', 'email'=>'atiq@gmail.com', 'password'=>bcrypt('12345678')],
        	['name'=>'Mohammad Ali', 'email'=>'mdali@gmail.com', 'password'=>bcrypt('12345678')]
        ];

        \DB::table('users')->insert($data);

    }

}
