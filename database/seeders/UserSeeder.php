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
        DB::table('users')->insert([
           'name' => 'Admin', 
            'email' => 'integrators@gmail.com',
            'cnic' =>'5440003877423',
            'password' => bcrypt('123456'),
            'department' =>'Education'
     
        ]);
    }
}
