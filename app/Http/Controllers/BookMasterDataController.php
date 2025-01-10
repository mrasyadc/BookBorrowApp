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
        return view('admin.bookmaster', ['books' => $books]);
    }
}
