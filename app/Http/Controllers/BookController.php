<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
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
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
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

        $book = Book::create([
            'name' => $request->name,
            'pages' => $request->input('pages'),
            'year' => $request->input('year'),
            'image' => $image,
            'author_id' =>  $request->input('author_id'),
        ]);

        $book->categories()->attach($request->input('categories'));


        return redirect()->route('books.index')->with('success', 'Libro creato con successo');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
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
            'image' => $image,
            'author_id' =>  $request->input('author_id'),
        ]);
        $book->categories()->detach();
        $book->categories()->attach($request->input('categories'));

        return redirect()->route('books.index')->with('success', 'Libro modificato con successo');
    }


    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Libro eliminato con successo');
    }
}
