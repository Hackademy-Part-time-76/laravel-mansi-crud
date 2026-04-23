<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        return view('books.create');
        //     Book::create([
        //         'name' => 'Libro di storia',
        //         'pages' => 897,
        //         'year' => 2025,
        //     ]);

        //     Book::create([
        //         'name' => 'Libro di narrativa',
        //         'pages' => 197,
        //         'year' => 2022,
        //     ]);
        //     dd('libri creati');
    }

    public function store(BookStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('covers', 'public');
        } else {
            $image = 'assets/default.png';
        }

        Book::create([
            'name' => $request->name,
            'pages' => $request->input('pages'),
            'year' => $request->input('year'),
            'image' => $image
        ]);

        return redirect()->route('books.index')->with('success', 'Libro creato con successo');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('covers', 'public');
        } else {
            $image = $book->image;
        }
        $book->update([
            'name' => $request->name,
            'pages' => $request->input('pages'),
            'year' => $request->input('year'),
            'image' => $image
        ]);

        return redirect()->route('books.index')->with('success', 'Libro modificato con successo');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminato con successo');
    }
}
