<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(25)->create();

         \App\Models\User::factory()->create([
             'name' => 'flipper',
             'email' => 'flipper@gmail.com',
             'email_verified_at' => now(),
             'password' => bcrypt('password'), // password
             'remember_token' => Str::random(10)
         ]);


        \App\Models\User::factory()->create([
            'name' => 'clipper',
            'email' => 'clipper@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Apassword'), // password
            'remember_token' => Str::random(10),
            'is_admin' => 1
        ]);
    }
}
