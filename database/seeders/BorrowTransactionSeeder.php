<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BorrowTransaction;
use Carbon\Carbon;

class BorrowTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BorrowTransaction::create([
            'user_id' => 2, // regular user
            'book_id' => 1, // "Introduction to Laravel"
            'borrow_date' => Carbon::now()->subDays(5),
            'return_date' => null,
            'total_cost' => 10000, // Example cost
        ]);

        BorrowTransaction::create([
            'user_id' => 2, // regular user
            'book_id' => 2, // "Advanced PHP"
            'borrow_date' => Carbon::now()->subDays(7),
            'return_date' => Carbon::now()->subDays(2),
            'total_cost' => 21000,
        ]);

        // New borrow transactions for Regular User 1
        BorrowTransaction::create([
            'user_id' => 3, // Regular User 1
            'book_id' => 1, // "Introduction to Laravel"
            'borrow_date' => Carbon::now()->subDays(10), // 10 days ago
            'return_date' => Carbon::now()->subDays(5),  // 5 days ago
            'total_cost' => 25000,
        ]);

        BorrowTransaction::create([
            'user_id' => 3, // Regular User 1
            'book_id' => 3, // "Mastering Databases"
            'borrow_date' => Carbon::now()->subDays(8),  // 8 days ago
            'return_date' => Carbon::now()->subDays(4),  // 4 days ago
            'total_cost' => 24000,
        ]);

        // New borrow transactions for Regular User 2
        BorrowTransaction::create([
            'user_id' => 4, // Regular User 2
            'book_id' => 2, // "Advanced PHP"
            'borrow_date' => Carbon::now()->subDays(12), // 12 days ago
            'return_date' => Carbon::now()->subDays(10), // 10 days ago
            'total_cost' => 14000,
        ]);

        BorrowTransaction::create([
            'user_id' => 4, // Regular User 2
            'book_id' => 1, // "Introduction to Laravel"
            'borrow_date' => Carbon::now()->subDays(15), // 15 days ago
            'return_date' => Carbon::now()->subDays(12), // 12 days ago
            'total_cost' => 20000,
        ]);

        // New borrow transactions for Regular User 3
        BorrowTransaction::create([
            'user_id' => 5, // Regular User 3
            'book_id' => 2, // "Advanced PHP"
            'borrow_date' => Carbon::now()->subDays(14), // 14 days ago
            'return_date' => Carbon::now()->subDays(7),  // 7 days ago
            'total_cost' => 30000,
        ]);

        BorrowTransaction::create([
            'user_id' => 5, // Regular User 3
            'book_id' => 3, // "Mastering Databases"
            'borrow_date' => Carbon::now()->subDays(9),  // 9 days ago
            'return_date' => Carbon::now()->subDays(6),  // 6 days ago
            'total_cost' => 25000,
        ]);

        // New borrow transactions for Regular User 4
        BorrowTransaction::create([
            'user_id' => 6, // Regular User 4
            'book_id' => 1, // "Introduction to Laravel"
            'borrow_date' => Carbon::now()->subDays(20), // 20 days ago
            'return_date' => Carbon::now()->subDays(10), // 10 days ago
            'total_cost' => 5000,
        ]);

        BorrowTransaction::create([
            'user_id' => 6, // Regular User 4
            'book_id' => 2, // "Advanced PHP"
            'borrow_date' => Carbon::now()->subDays(18), // 18 days ago
            'return_date' => Carbon::now()->subDays(13), // 13 days ago
            'total_cost' => 14000,
        ]);
        BorrowTransaction::create([
            'user_id' => 4, // admin user
            'book_id' => 1, // "Introduction to Laravel"
            'borrow_date' => Carbon::now()->subDays(5),
            'return_date' => Carbon::now()->subDays(3),
            'total_cost' => 10000, // Example cost
        ]);

        BorrowTransaction::create([
            'user_id' => 3, // regular user
            'book_id' => 2, // "Advanced PHP"
            'borrow_date' => Carbon::now()->subDays(7),
            'return_date' => Carbon::now()->subDays(2),
            'total_cost' => 21000,
        ]);

        // New borrow transactions for Regular User 1
        BorrowTransaction::create([
            'user_id' => 3, // Regular User 1
            'book_id' => 1, // "Introduction to Laravel"
            'borrow_date' => Carbon::now()->subDays(10), // 10 days ago
            'return_date' => Carbon::now()->subDays(5),  // 5 days ago
            'total_cost' => 25000,
        ]);

        BorrowTransaction::create([
            'user_id' => 3, // Regular User 1
            'book_id' => 3, // "Mastering Databases"
            'borrow_date' => Carbon::now()->subDays(8),  // 8 days ago
            'return_date' => Carbon::now()->subDays(4),  // 4 days ago
            'total_cost' => 24000,
        ]);

        // New borrow transactions for Regular User 2
        BorrowTransaction::create([
            'user_id' => 4, // Regular User 2
            'book_id' => 2, // "Advanced PHP"
            'borrow_date' => Carbon::now()->subDays(12), // 12 days ago
            'return_date' => Carbon::now()->subDays(10), // 10 days ago
            'total_cost' => 14000,
        ]);

        BorrowTransaction::create([
            'user_id' => 4, // Regular User 2
            'book_id' => 1, // "Introduction to Laravel"
            'borrow_date' => Carbon::now()->subDays(15), // 15 days ago
            'return_date' => Carbon::now()->subDays(12), // 12 days ago
            'total_cost' => 20000,
        ]);

        // New borrow transactions for Regular User 3
        BorrowTransaction::create([
            'user_id' => 5, // Regular User 3
            'book_id' => 2, // "Advanced PHP"
            'borrow_date' => Carbon::now()->subDays(14), // 14 days ago
            'return_date' => Carbon::now()->subDays(7),  // 7 days ago
            'total_cost' => 30000,
        ]);

        BorrowTransaction::create([
            'user_id' => 5, // Regular User 3
            'book_id' => 3, // "Mastering Databases"
            'borrow_date' => Carbon::now()->subDays(9),  // 9 days ago
            'return_date' => Carbon::now()->subDays(6),  // 6 days ago
            'total_cost' => 25000,
        ]);

        // New borrow transactions for Regular User 4
        BorrowTransaction::create([
            'user_id' => 6, // Regular User 4
            'book_id' => 1, // "Introduction to Laravel"
            'borrow_date' => Carbon::now()->subDays(20), // 20 days ago
            'return_date' => Carbon::now()->subDays(10), // 10 days ago
            'total_cost' => 5000,
        ]);

        BorrowTransaction::create([
            'user_id' => 6, // Regular User 4
            'book_id' => 2, // "Advanced PHP"
            'borrow_date' => Carbon::now()->subDays(18), // 18 days ago
            'return_date' => Carbon::now()->subDays(13), // 13 days ago
            'total_cost' => 14000,
        ]);
    }
}
