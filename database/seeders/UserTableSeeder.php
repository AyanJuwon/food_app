<?php

namespace Database\Seeders;


use App\Models\User;
use Faker\Generator as Faker;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'firstName' => 'Olamiposi',
            'lastName' => 'Olaiya',
            'email' => 'posi@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12'), // password
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        User::create([
            'firstName' => 'Ayanniran',
            'lastName' => 'Juwon',
            'email' => 'juwon@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12'), // password
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);
    }
}
