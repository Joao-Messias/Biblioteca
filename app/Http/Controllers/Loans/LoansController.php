<?php

namespace App\Http\Controllers\Loans;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoansRequest;
use App\Models\Book;
use App\Models\Clients;
use App\Models\Loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    public function index(Request $request)
    {
        $isbn = $request->input('q');
        if ($isbn) {
            $book = Book::where('isbn', 'LIKE', "%{$isbn}%")->first();
            $loans = Loans::where('book_id', $book->id)->with('client')->with('book')->get();
        } else {
            $loans = Loans::with('client')->with('book')->get();
        }
        return view('loans.index')
            ->with('loans', $loans);
    }

    public function create()
    {
        $clients = Clients::all();
        $books = Book::all();
        return view('loans.create')
            ->with('clients', $clients)
            ->with('books', $books);
    }

    public function store(LoansRequest $request)
    {
        $validated = $request->validated();
        $loans = new Loans();
        $loans->client_id = $validated['client'];
        $loans->book_id = $validated['book'];
        $loans->loan_date = now();
        $loans->return_date = $validated['return_date'];
        $loans->status = 'Locado';
        $loans->quantity = $validated['quantity'];
        $loans->save();
        $book = Book::find($validated['book']);
        $book->quantity = $book->quantity - $validated['quantity'];
        $book->emprestimo_id = $loans->id;
        $book->save();

        return redirect()->route('loans.index');
    }

    public function return($id)
    {
        $loans = Loans::find($id);
        $loans->status = 'Devolvido';
        $loans->save();
        $book = Book::find($loans->book_id);
        $book->quantity = $book->quantity + $loans->quantity;
        $book->emprestimo_id = null;
        $book->save();
        return redirect()->route('loans.index');
    }
}
