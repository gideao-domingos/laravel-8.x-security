<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' =>'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'password_changed_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Gideão',
            'email' =>'gd@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'password_changed_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
