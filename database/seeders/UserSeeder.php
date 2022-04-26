<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
       /* DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('1234'),
        ]);*/
        /*DB::table('users')->insert([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'role' => 'editor',
            'password' => Hash::make('1234'),
        ]);*/
        DB::table('users')->insert([
            'name' => 'viewer',
            'email' => 'viewer@gmail.com',
            'role' => 'viewer',
            'password' => Hash::make('1234'),
        ]);
    }
}
