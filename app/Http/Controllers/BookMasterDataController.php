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
}
