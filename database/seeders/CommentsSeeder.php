<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = 1;
        while ($i < 11){
            Comment::create([
                'book_id' => 1,
                'user_id' => 1,
                'content' => \Str::random(10)
            ]);
            $i++;
        }
    }
}
