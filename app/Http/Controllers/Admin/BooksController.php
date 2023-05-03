<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BooksRequest;
use App\Http\Services\BookService;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category', 'author')->get();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.books.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BooksRequest $booksRequest, BookService $bookService)
    {
        $validated = $booksRequest->validated();
        $cover = $bookService->uploadImage($booksRequest);
        try {
            $book = Book::create([
                'title' => $validated['title'],
                'category_id' => $validated['category_id'],
                'slug' => $validated['slug'] ?? \Str::slug($validated['title']),
                'author_id' => $validated['author_id'],
                'description' => $validated['description'],
                'rating' => $validated['rating'],
                'cover' => $cover ?? '',
            ]);
        } catch (\Exception  $exception) {
            return redirect()->back()->withErrors(['error' => 'Произошла ошибка при создании книги']);
        }
        return redirect()->route('books.edit', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.books.edit', compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BooksRequest $booksRequest, Book $book, BookService $bookService)
    {
        $validated = $booksRequest->validated();
        $cover = $bookService->uploadImage($booksRequest);
        try {
            $book->update([
                'title' => $validated['title'],
                'category_id' => $validated['category_id'],
                'slug' => $validated['slug'] ?? \Str::slug($validated['title']),
                'author_id' => $validated['author_id'],
                'description' => $validated['description'],
                'rating' => $validated['rating'],
                'cover' => $cover ?? $book->cover,
            ]);
        } catch (\Exception  $exception) {
            return redirect()->back()->withErrors(['error' => 'Произошла ошибка при обновлении данных']);
        }
        return redirect()->route('books.edit', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
        } catch (\Exception  $exception) {
            return redirect()->back()->withErrors(['error' => 'Произошла ошибка при удалении']);
        }
        return redirect()->route('books.index');
    }
}
