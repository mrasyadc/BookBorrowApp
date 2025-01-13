<?php

namespace App\Http\Controllers;

use App\Services\CalculationService;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BorrowTransactionController extends Controller
{
    public function __construct(CalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    public function index()
    {
        // Get all books from the database
        $books = Book::all();

        // Return the view with the books
        return view('user.borrowTransaction.read', ['books' => $books]);
    }

    public function store($bookId)
    {
        $book = Book::findOrFail($bookId);
        // using transaction
        $borrowTransaction = new BorrowTransaction();
        $borrowTransaction->book_id = $bookId;
        $borrowTransaction->user_id = Auth::id();
        $borrowTransaction->borrow_date = Carbon::now();
        $borrowTransaction->total_cost = $this->calculationService->multiply(1, $book->price_per_day);
        $borrowTransaction->save();

        // Redirect to the borrow transaction page
        return redirect()->route('user.borrow-transaction');
    }
}
