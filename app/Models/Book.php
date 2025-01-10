<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'price_per_day'];

    // Define the relationship with BorrowTransaction
    public function borrowTransactions()
    {
        return $this->hasMany(BorrowTransaction::class);
    }

    public $timestamps = true;
}
