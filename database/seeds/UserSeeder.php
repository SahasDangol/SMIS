<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('turing'),
            'user_type'=>'Admin'],
        ]);
    }
}
