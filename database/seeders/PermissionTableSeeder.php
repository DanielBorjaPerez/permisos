<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->keyname = 'home';
        $permission->name = 'home';
        $permission->save();
    
        $permisson_role = Role::where('name', 'user')->first();
        $permission->roles()->attach($permisson_role);
        $permisson_role = Role::where('name', 'admin')->first();
        $permission->roles()->attach($permisson_role);
    
        $permission = new Permission();
        $permission->keyname = 'list-users';
        $permission->name = 'See List Users';
        $permission->save();
    
        $permisson_role = Role::where('name', 'user')->first();
        $permission->roles()->attach($permisson_role);
        $permisson_role = Role::where('name', 'admin')->first();
        $permission->roles()->attach($permisson_role);
    
        $permission = new Permission();
        $permission->keyname = 'edit-user';
        $permission->name = 'Edit and Create User';
        $permission->save();
    
        $permisson_role = Role::where('name', 'admin')->first();
        $permission->roles()->attach($permisson_role);
    }
}
