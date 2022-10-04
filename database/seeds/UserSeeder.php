<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
                'name' => 'admin',
                'email' => 'admin@chronoknowledge.com',
                'role_id' => 1,
                'password' => \Hash::make('admin')
        ]);

        factory(User::class, 1)->create([
            'name' => 'user',
            'email' => 'user@chronoknowledge.com',
            'role_id' => 2,
            'password' => \Hash::make('user')
        ]);
    }
}
