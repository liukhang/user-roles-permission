<?php

use Illuminate\Database\Seeder;
use App\Models\User;
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
            'password' => bcrypt('123456'),
            'phone' => '0963207012',
            'address' => 'Hà Nội 1'
        ]);

        $role = Role::create(['name' => 'super-admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $super->assignRole([$role->id]);

        $admin = User::create([
        	'name' => 'admin', 
        	'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '0963207012',
            'address' => 'Hà Nội 2'
        ]);

        $role = Role::create(['name' => 'admin']);

        $role->syncPermissions(['1', '3']);

        $admin->assignRole([$role->id]);

        $collaborators = User::create([
        	'name' => 'collaborators', 
        	'email' => 'collaborators@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '0963207012',
            'address' => 'Hà Nội 3'
        ]);

        $role = Role::create(['name' => 'collaborators']);

        $role->syncPermissions(['1', '4']);

        $collaborators->assignRole([$role->id]);

        $customer = User::create([
        	'name' => 'customer', 
        	'email' => 'customer@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '0963207012',
            'address' => 'Hà Nội 4'
        ]);

        $role = Role::create(['name' => 'customer']);

        $role->syncPermissions(['5']);

        $customer->assignRole([$role->id]);

        $guest = User::create([
        	'name' => 'guest', 
        	'email' => 'guest@bbqhome.com',
            'password' => bcrypt('6raezA6p'),
            'phone' => '0963207012',
            'address' => 'Hà Nội 5'
        ]);

        $guest->assignRole('customer');
    }
}

