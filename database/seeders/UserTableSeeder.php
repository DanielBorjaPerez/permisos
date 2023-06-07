<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bCrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);

        $role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bCrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);

        for ($i=0; $i < 12 ; $i++) { 
            $role_user = Role::where('name', 'user')->first();
            $user = User::factory()->create();
            $user->roles()->attach($role_user);
        }
    }
}
