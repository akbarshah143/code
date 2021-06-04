<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class GroupInsuraceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_insurace_types')->insert([
            'GITypeID' => '01',
            'GITypeDesc' => 'Retirement',
        ]);

        DB::table('group_insurace_types')->insert([
            'GITypeID' => '02',
            'GITypeDesc' => 'Death',
        ]);

        DB::table('group_insurace_types')->insert([
            'GITypeID' => '03',
            'GITypeDesc' => 'Death After Retirement',
        ]);


    }
}
