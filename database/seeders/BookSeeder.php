<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Introduction to Laravel',
            'author' => 'John Doe',
            'price_per_day' => 5000, // Price per day in Rupiah
        ]);

        Book::create([
            'title' => 'Advanced PHP',
            'author' => 'Jane Smith',
            'price_per_day' => 7000,
        ]);

        Book::create([
            'title' => 'Mastering Databases',
            'author' => 'Alice Johnson',
            'price_per_day' => 6000,
        ]);
    }
}
