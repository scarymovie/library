<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category', 'author')->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}
