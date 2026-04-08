<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(Faker $faker): void
    {
        User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker->password, //hash('sha256', 123345)
        ]);
    }
}
