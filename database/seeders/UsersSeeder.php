<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Enums\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'administrador1',
            'email' => 'admin1@gmail.com',
            'role' => Role::Admin,
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10), 
        ]);

        User::create([
            'name' => 'administrador2',
            'email' => 'admin2@gmail.com',
            'role' => Role::Admin,
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10), 
        ]);

        User::create([
            'name' => 'administrador3',
            'email' => 'admin3@gmail.com',
            'role' => Role::Admin,
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10), 
        ]);

        User::factory(100)->create([
            'role' => Role::User,
        ]);
    }
}