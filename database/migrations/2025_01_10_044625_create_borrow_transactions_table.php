<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrow_transactions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict'); // FK to users
            $table->foreignId('book_id')->constrained('books')->onDelete('restrict'); // FK to books
            $table->date('borrow_date');
            $table->date('planned_return_date');
            $table->date('actual_return_date')->nullable();
            $table->bigInteger('total_cost'); // Total biaya
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_transactions');
    }
};
