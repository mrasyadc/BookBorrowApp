<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

class BookMasterDataController extends Controller
{
    public function index()
    {
        // Get all books from the database
        $books = Book::all();

        // Return the view with the books
        return view('admin.bookmaster.read', ['books' => $books]);
    }

    public function edit($bookId)
    {
        $book = Book::find($bookId);

        // Return the view with the book
        return view('admin.bookmaster.edit', ['book' => $book]);
    }

    public function update(Request $request, $bookId)
    {
        // dd($request->all());
        // Validate the request

        // TODO:
        // masih errorrrr karena $book->save() ga dijalankan entah kenapa???
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price_per_day' => 'required|numeric',
        ]);

        // Find the book
        $book = Book::find($bookId);

        // Update the book
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price_per_day = $request->price_per_day;
        // Save the book
        $book->save();



        // Redirect to the bookmaster page
        return redirect()->route('admin.bookmaster.read');
    }

    public function destroy($bookId)
    {
        // Find the book
        $book = Book::find($bookId);

        // Delete the book
        $book->delete();

        // Redirect to the bookmaster page
        return redirect()->route('admin.bookmaster.read');
    }

    public function create()
    {
        // Return the view with the book
        return view('admin.bookmaster.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price_per_day' => 'required|numeric',
        ]);

        // Create a new book
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price_per_day = $request->price_per_day;
        // Save the book
        $book->save();

        // Redirect to the bookmaster page
        return redirect()->route('admin.bookmaster.read');
    }
}
