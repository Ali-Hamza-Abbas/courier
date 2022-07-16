<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'admin',
            'lastName' => 'admin',
            'email' => 'admin@gmail.com',
            'admin' => '1',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'Ali Hamza',
            'lastName' => 'Abbas',
            'email' => 'alihamza48123@gmail.com',
            'admin' => '1',
            'password' => Hash::make('password'),
        ]);
    }
}
