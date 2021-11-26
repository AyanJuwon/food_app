<?php

namespace Database\Seeders;


use Faker\Generator as Faker;


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
        //
         if (User::count() == 0) {

            User::create([
                'firstName'           => $this->faker()->name,
                'lastName'           => $this->faker()->name,
                'email'          => $this->faker()->email,
                'password'       => bcrypt(config('voyager.adminPassword')),
                'remember_token' => str_random(60),
                'role_id'        => $role->id,
            ]);
        }
    }
}