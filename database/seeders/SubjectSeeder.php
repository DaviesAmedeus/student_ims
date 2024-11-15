<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'name' => 'Mathematics',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],

            [
                'name' => 'Kiswahili',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],

            [
                'name' => 'English',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],

            [
                'name' => 'Science',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],

            [
                'name' => 'Geography',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],
            [
                'name' => 'History',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],
            [
                'name' => 'Civics',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],
            [
                'name' => 'Vocational Skills',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],

            [
                'name' => 'Information Technology & Communications (ICT)',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],

            [
                'name' => 'Reading',
                'status' => true,
                'created_by' => 1,
                'type' => 1,
            ],

            [
                'name' => 'Writing',
                'status' => true,
                'created_by' => 1,
                'type' => 1,
            ],

            [
                'name' => 'Numbers',
                'status' => true,
                'created_by' => 1,
                'type' => 0,
            ],

            [
                'name' => 'Drawing',
                'status' => true,
                'created_by' => 1,
                'type' => 1,
            ],


        ];



            Subject::insert($subjects);
    }
}
