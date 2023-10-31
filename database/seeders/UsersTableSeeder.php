<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminpassword'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $adminUser->assignRole($adminRole);

        $userUser = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('userpassword'),
        ]);
        $userRole = Role::where('name', 'user')->first();
        $userUser->assignRole($userRole);

        $userUser1 = User::create([
            'name' => 'User 1',
            'email' => 'user_1@gmail.com',
            'password' => bcrypt('user1password'),
        ]);
        $userUser1->assignRole($userRole);
    }
}
