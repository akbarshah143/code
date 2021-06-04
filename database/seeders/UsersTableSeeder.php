<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = User::create([
            'name' => 'Akbar Shah', 
            'email' => 'admin@gmail.com',
            'cnic' =>'5440003877413',
            'password' => bcrypt('123456'),
            'department' =>'Education'
     
        ]);
        $role = Role::create(['name' => 'Admin']);
                            
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
