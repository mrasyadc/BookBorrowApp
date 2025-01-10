<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowTransaction extends Model
{
    use HasFactory;
    // Specify the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'return_date',
        'total_cost',
    ];

    // A BorrowTransaction belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A BorrowTransaction belongs to a Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
