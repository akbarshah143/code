<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Relations;
class RelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relations')->insert([
             'RelationID' => '01',
            'RelationDesc' => 'Self',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '02',
            'RelationDesc' => 'First Wife',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '03',
            'RelationDesc' => 'Second Wife',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '04',
            'RelationDesc' => 'Third Wife',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '05',
            'RelationDesc' => 'Forth Wife',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '06',
            'RelationDesc' => 'First Widow',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '07',
            'RelationDesc' => 'Second Widow',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '08',
            'RelationDesc' => 'Third Widow',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '09',
            'RelationDesc' => 'Forth Widow',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '10',
            'RelationDesc' => 'Mother',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '11',
            'RelationDesc' => 'Father',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '12',
            'RelationDesc' => 'Daughter',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '13',
            'RelationDesc' => 'Son',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '14',
            'RelationDesc' => 'Sister',
            'user_id' => '1',
        ]);
        DB::table('relations')->insert([
             'RelationID' => '15',
            'RelationDesc' => 'Brother',
            'user_id' => '1',
        ]);
         DB::table('relations')->insert([
             'RelationID' => '16',
            'RelationDesc' => 'Husband',
            'user_id' => '1',
        ]);
    }
}
