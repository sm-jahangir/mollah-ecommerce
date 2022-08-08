<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug', 'admin')->first();
        // Create admin
        User::updateOrCreate([
            'role_id' => $adminRole->id,
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'status' => true
        ]);

        // Create user
        $userRole = Role::where('slug', 'user')->first();
        User::updateOrCreate([
            'role_id' => $userRole->id,
            'name' => 'Jone Doe',
            'email' => 'user@mail.com',
            'password' => Hash::make('password'),
            'status' => true
        ]);
        //Create Guest User
        User::updateOrCreate([
            'role_id' => $userRole->id,
            'name' => 'Guest',
            'email' => 'geuest@mail.com',
            'password' => Hash::make('passw%$#@!&*()<>?/.879654!*&^faord'),
            'status' => true
        ]);
    }
}
