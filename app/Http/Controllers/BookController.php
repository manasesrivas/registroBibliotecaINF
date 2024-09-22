<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use illuminate\Http\RedirectResponse;
use App\Models\Book;

class BookController extends Controller
{
    public function index(): View{
        $books = Book::all();
        $pendientes = Book::where("disponible", false)->count();
        return view('book.index', compact('books', 'pendientes'));
    }

    public function create(): View{
        return view('book.create');
    }

    public function store(Request $request): RedirectResponse{
        Book::create($request->all());
        return redirect()->route('book.index');
    }

    public function edit(Book $book): View{
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, Book $book): RedirectResponse{
        $book->update($request->all());
        return redirect()->route('book.index');
    }

    public function destroy(Book $book): RedirectResponse{
        $book->delete();
        return redirect()->route('book.index');
    }
    
}
