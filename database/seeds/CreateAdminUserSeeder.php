<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
        	'name' => 'super-admin', 
        	'email' => 'super-admin@gmail.com',
        	'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'super-admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $super->assignRole([$role->id]);

        $admin = User::create([
        	'name' => 'admin', 
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'admin']);

        $collaborators = User::create([
        	'name' => 'collaborators', 
        	'email' => 'collaborators@gmail.com',
        	'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'collaborators']);

        $customer = User::create([
        	'name' => 'customer', 
        	'email' => 'customer@gmail.com',
        	'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'customer']);
    }
}
