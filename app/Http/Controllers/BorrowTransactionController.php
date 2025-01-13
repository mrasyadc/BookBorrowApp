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

    public function store(Request $request)
    {
        // @dd($request->all());
        // Validate the request
        $validated = $request->validate([
            'bookId' => 'required|exists:books,id',
            'start' => 'required|date|after:today',
            'end' => 'required|date|after:start',
        ]);

        $bookId = $validated['bookId'];
        $start = $validated['start'];
        $end = $validated['end'];

        $totalDays = Carbon::parse($start)->diffInDays(Carbon::parse($end));


        $book = Book::findOrFail($bookId);
        // using transaction

        $borrowTransaction = new BorrowTransaction();
        $borrowTransaction->book_id = $bookId;
        $borrowTransaction->user_id = Auth::id();
        $borrowTransaction->borrow_date = Carbon::parse($start);
        $borrowTransaction->planned_return_date = Carbon::parse($end);
        $borrowTransaction->total_cost = $this->calculationService->multiply($totalDays, $book->price_per_day);
        $borrowTransaction->save();

        // Redirect to the borrow transaction page
        return redirect()->route('user.report');
    }

    public function userBorrowBookShow($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('user.borrowTransaction.create', ['book' => $book]);
    }

    public function returnBookShow()
    {
        // show all books that user borrowed and have not been returned
        // Fetch unreturned transactions
        $unreturnedTransactions = BorrowTransaction::with(['user', 'book'])
            ->where('user_id', Auth::id())
            ->whereNull('actual_return_date')
            ->get();

        // Calculate total_cost for each transaction
        $transactionsWithCost = $unreturnedTransactions->map(function ($transaction) {
            $borrowDate = \Carbon\Carbon::parse($transaction->borrow_date);
            $plannedReturnDate = \Carbon\Carbon::parse($transaction->planned_return_date);
            $now = now();

            // Determine total days
            $totalDays = $now->greaterThan($plannedReturnDate)
                ? $borrowDate->diffInDays($now)
                : $borrowDate->diffInDays($plannedReturnDate);

            // Calculate total cost using calculationService
            $pricePerDay = $transaction->book->price_per_day;
            $totalCost = $this->calculationService->multiply($pricePerDay, $totalDays);

            // Add total cost to the transaction for the view
            $transaction->total_cost = $totalCost;

            return $transaction;
        });

        return view('user.borrowTransaction.return', ['unreturnedTransactions' => $transactionsWithCost]);
    }

    public function returnBookPost(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'transactionId' => 'required|exists:borrow_transactions,id',
        ]);

        $transactionId = $validated['transactionId'];

        // Find the transaction
        $transaction = BorrowTransaction::findOrFail($transactionId);

        // Set the actual return date
        $transaction->actual_return_date = now();

        // Save the transaction
        $transaction->save();

        // Redirect to the return transaction page
        return redirect()->route('user.return-transaction');
    }
}
