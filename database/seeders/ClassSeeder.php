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
                'name'=> 'Maarifa Ya Jamii',
                'status'=>true,
                'created_by'=>1
            ],





            ];



            ClassModel::insert($classes);
    }
}
