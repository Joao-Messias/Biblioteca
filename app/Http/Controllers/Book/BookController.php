<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        if ($q) {
            $books = Book::where('title', 'LIKE', "%{$q}%")
                ->orWhere('isbn', 'LIKE', "%{$q}%")
                ->get();
        } else {
            $books = Book::all();
        }
        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(BookRequest $request)
    {
        $validated = $request->validated();
        $book = new Book();
        $book->fill($validated);
        $book->save();
        return redirect()->route('book.index');
    }

    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $validated = $request->validated();
        $book->fill($validated);
        $book->save();
        return redirect()->route('book.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
