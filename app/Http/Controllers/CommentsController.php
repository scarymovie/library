<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentsRequest $commentsRequest, Book $book)
    {
        $validated = $commentsRequest->validated();
        $comment = Comment::create([
            'user_id' => \Auth::id(),
            'book_id' => $book->id,
            'content' => $validated['content']
        ]);

        return redirect()->back();
    }
}
