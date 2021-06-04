<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([EmployeeMaritalTableSeeder::class]);
        $this->call([UserGradeTableSeeder::class]);
        $this->call([PermissionTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([GroupInsuraceTypeTableSeeder::class]);
        $this->call([RelationTableSeeder::class]);
    }
}
