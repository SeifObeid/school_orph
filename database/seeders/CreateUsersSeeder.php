<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'employee@gmail.com',
                'role' => 'employee',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Seif',
                'email' => 'seifobeid11@gmail.com',
                'role' => 'employee',
                'password' => bcrypt('seifobeid'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
