<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class EmployeeMaritalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marital')->insert([
             'no' => '01',
            'status' => 'Single',
        ]);

        DB::table('marital')->insert([
             'no' => '02',
            'status' => 'Married',
        ]);
    }
}
