<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=> 'Admin',
                'email'=> 'admin@sims.com',
                'email_verified_at'=> now(),
                'password'=> bcrypt('123456'),
                'user_type'=> 1,

            ],

            [
                'name'=> 'Teacher',
                'email'=> 'teacher@sims.com',
                'email_verified_at'=> now(),
                'password'=> bcrypt('123456'),
                'user_type'=> 2,
            ],

            [
                'name'=> 'Student',
                'email'=> 'student@sims.com',
                'email_verified_at'=> now(),
                'password'=> bcrypt('123456'),
                'user_type'=> 3,
            ],

            [
                'name'=> 'Parent',
                'email'=> 'parent@sims.com',
                'email_verified_at'=> now(),
                'password'=> bcrypt('123456'),
                'user_type'=> 4,
            ]

            ];



            User::insert($users);

    }
}
