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
            // Admins
            [
                'name' => 'Admin',
                'email' => 'admin@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 1,



            ],

            // Teachers

            [
                'name' => 'Sr. Alex',
                'email' => 'teacher1@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 2,
            ],

            [
                'name' => 'Ms. Linda',
                'email' => 'teacher2@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 2,
            ],

            [
                'name' => 'Mr. Peter',
                'email' => 'teacher3@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 2,
            ],

     

            // Students
            [
                'name' => 'Bernicebella',
                'email' => 'bernicebella@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 3,
            ],

            [
                'name' => 'Emmanuel',
                'email' => 'emmanuel@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 3,
            ],

            [
                'name' => 'Angelica',
                'email' => 'angelica@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 3,

            ],

            [
                'name' => 'Victor',
                'email' => 'victor@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 3,

            ],




            // Parents

            [
                'name' => 'Davies',
                'email' => 'davies@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 4,

            ],

            [
                'name' => 'Grace',
                'email' => 'grace@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 4,
            ],

            [
                'name' => 'Samuel',
                'email' => 'samuel@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 4,
            ],

            [
                'name' => 'Lilian',
                'email' => 'lilian@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 4,

            ],
            [
                'name' => 'John',
                'email' => 'john@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 4,],

            [
                'name' => 'Esther',
                'email' => 'esther@sims.com',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'user_type' => 4,

            ],



        ];



        User::insert($users);
    }
}
