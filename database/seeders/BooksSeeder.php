<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = 1;
        while ($i < 15){
            $title = \Str::random(5);
            $category_id = rand(1,5);
            $slug = \Str::slug($title);
            $author = \Str::random(5);
            $description = \Str::random(50);
            $rating = rand(1,10);
            $cover = '';
            $book = ['title' => $title, 'category_id' => $category_id, 'slug' => $slug, 'author' => $author,
                    'description' => $description, 'rating' => $rating, 'cover' => $cover
                ];
            $newBook = Book::create($book);
            $i++;
        }
    }
}
