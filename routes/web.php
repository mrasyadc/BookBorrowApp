<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookMasterDataController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserReportController;
use App\Http\Middleware\CheckUserType;
use App\Http\Controllers\BorrowTransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    // Get the authenticated user
    $user = Auth::user();

    // Check user role and redirect accordingly
    if ($user->role === 'admin') {
        return redirect()->route('admin.bookmaster.read');  // Redirect to admin dashboard
    }

    return redirect()->route('user.borrow-transaction');  // Redirect to user dashboard
})->middleware('auth')->name('dashboard');  // Make sure the user is authenticated




// profile routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin and user routes
Route::middleware('auth')->group(function () {
    // Route::get('/temp', function () {
    //     return redirect()->route('admin.books');
    // });



    Route::middleware(CheckUserType::class . ':admin')->group(function () {
        Route::get('/admin/books', [BookMasterDataController::class, 'index'])->name('admin.bookmaster.read');
        Route::get('/admin/books/edit/{bookId}', [BookMasterDataController::class, 'edit'])->name('admin.bookmaster.edit');
        Route::post('/admin/books/edit/{bookId}', [BookMasterDataController::class, 'update'])->name('admin.bookmaster.update');
        Route::post('/admin/books/delete/{bookId}', [BookMasterDataController::class, 'destroy'])->name('admin.bookmaster.destroy');
        Route::get('/admin/books/create', [BookMasterDataController::class, 'create'])->name('admin.bookmaster.create');
        Route::post('/admin/books/create', [BookMasterDataController::class, 'store'])->name('admin.bookmaster.store');
        Route::get('/admin/report', [ReportController::class, 'allBorrowReports'])->name('admin.report.read');
        Route::get('/admin/report/export/excel', [ReportController::class, 'allBorrowReportsExcel'])->name('admin.report.excel');
        Route::get('/admin/report/export/pdf', [ReportController::class, 'allBorrowReportsPDF'])->name('admin.report.pdf');
    });

    Route::middleware(CheckUserType::class . ':user')->group(function () {
        // Route::get('/temp', function () {
        //     return redirect()->route('admin.books');
        // });

        Route::get('/user/borrow-transaction', [BorrowTransactionController::class, 'index'])->name('user.borrow-transaction');
        Route::post('/user/borrow-transaction', [BorrowTransactionController::class, 'store'])->name('user.borrow-transaction.store');
        Route::get('/user/borrow-transaction/book/{bookId}', [BorrowTransactionController::class, 'userBorrowBookShow'])->name('user.borrow-transaction.book');
        Route::get('/user/return-transaction', [BorrowTransactionController::class, 'returnBookShow'])->name('user.return-transaction');

        Route::get('/user/report', [UserReportController::class, 'userBorrowReports'])->name('user.report');
        Route::get('/user/report/export/excel', [UserReportController::class, 'userBorrowReportsExcel'])->name('user.report.excel');
        Route::get('/user/report/export/pdf', [UserReportController::class, 'userBorrowReportsPDF'])->name('user.report.pdf');
    });
});

require __DIR__ . '/auth.php';
