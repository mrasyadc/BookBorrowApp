<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookMasterDataController;
use App\Http\Middleware\CheckUserType;
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
        Route::get('/admin/report', function () {})->name('admin.report.read');
    });

    Route::middleware(CheckUserType::class . ':user')->group(function () {
        // Route::get('/temp', function () {
        //     return redirect()->route('admin.books');
        // });

        Route::get('/user/borrow-transaction', function () {
            return view('dashboard');
        })->name('user.borrow-transaction');

        Route::get('/user/report', function () {
            return view('dashboard');
        })->name('user.report');
    });
});

require __DIR__ . '/auth.php';
