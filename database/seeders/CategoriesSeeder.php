<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Научная фантастика', 'slug' => 'nauchnaya-fantastika'],
            ['title' => 'Фэнтези', 'slug' => 'fentezi'],
            ['title' => 'Романы', 'slug' => 'romany'],
            ['title' => 'Историческое', 'slug' => 'istoricheskoe'],
            ['title' => 'Детективы', 'slug' => 'detektivy'],
        ];

        Category::insert($categories);
    }
}
