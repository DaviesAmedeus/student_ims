<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'name' => 'Nursery',
                'status' => true,
                'created_by' => 1,
            ],
            [
                'name' => 'Standard One',
                'status' => true,
                'created_by' => 1,
            ],

            [
                'name' => 'Standard Two',
                'status' => true,
                'created_by' => 1,
            ],

            [
                'name' => 'Standard Three',
                'status' => true,
                'created_by' => 1,
            ],

            [
                'name' => 'Standard Four',
                'status' => true,
                'created_by' => 1,
            ],

            [
                'name' => 'Standard Five',
                'status' => true,
                'created_by' => 1,
            ],

            [
                'name' => 'Standard Six',
                'status' => true,
                'created_by' => 1,
            ],

            [
                'name' => 'Standard Seven',
                'status' => true,
                'created_by' => 1,
            ],


        ];



            ClassModel::insert($classes);
    }
}
