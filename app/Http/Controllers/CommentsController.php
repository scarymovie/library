<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Book;
use App\Models\Comment;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentsRequest $commentsRequest, Book $book)
    {
        $validated = $commentsRequest->validated();
        try {
            $comment = Comment::create([
                'user_id' => \Auth::id(),
                'book_id' => $book->id,
                'content' => $validated['content']
            ]);
        } catch (\Exception  $exception){
            return redirect()->back()->withErrors(['error' => 'Произошла ошибка при создании комментария']);
        }

        return redirect()->back();
    }
}
