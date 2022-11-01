<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtegoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'cat_name' => 'Kitchen',
            'status' => 1
        ]);

        Category::create([
            'cat_name' => 'Bathroom',
            'status' => 1
        ]);

        Category::create([
            'cat_name' => 'Living',
            'status' => 1
        ]);

        Category::create([
            'cat_name' => 'Other',
            'status' => 1
        ]);
    }
}
