<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker;

        User::create([
            'email' => 'user@chronoknowledge.com',
            'username' => 'user',
            'password' => \Hash::make('password'),
            'name' => 'Fel Reind Entica',
            'nick_name' => 'user', // password
            'gender' => '1', // female - 0, male - 1
            'zip_code' => '1234', // password
            'address' => 'Gagfa BuildingF. Cabahug St, Cebu City, Cebu', // password
            'tel' => '2-8403-5519',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ]);
    }
}
