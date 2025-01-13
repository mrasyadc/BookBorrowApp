<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProceduresForReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creating GetUserBorrowReports procedure
        DB::unprepared("
            DROP PROCEDURE IF EXISTS GetUserBorrowReports;
            CREATE PROCEDURE GetUserBorrowReports(IN p_user_id INT)
            SELECT
                bt.id as transaction_id,
                u.name as borrower_name,
                u.email as borrower_email,
                b.title as book_title,
                b.author as book_author,
                b.price_per_day,
                bt.borrow_date,
                bt.return_date,
                bt.total_cost,
                DATEDIFF(IFNULL(bt.return_date, CURDATE()), bt.borrow_date) as total_days
            FROM borrow_transactions bt
            INNER JOIN users u ON bt.user_id = u.id
            INNER JOIN books b ON bt.book_id = b.id
            WHERE bt.user_id = p_user_id
            ORDER BY bt.created_at DESC;
        ");

        // Creating GetAllBorrowReports procedure
        DB::unprepared("
            DROP PROCEDURE IF EXISTS GetAllBorrowReports;
            CREATE PROCEDURE GetAllBorrowReports()
            SELECT
                bt.id as transaction_id,
                u.name as borrower_name,
                u.email as borrower_email,
                b.title as book_title,
                b.author as book_author,
                b.price_per_day,
                bt.borrow_date,
                bt.return_date,
                bt.total_cost,
                DATEDIFF(IFNULL(bt.return_date, CURDATE()), bt.borrow_date) as total_days
            FROM borrow_transactions bt
            INNER JOIN users u ON bt.user_id = u.id
            INNER JOIN books b ON bt.book_id = b.id
            ORDER BY bt.created_at DESC;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Dropping the procedures if rolling back the migration
        DB::unprepared("DROP PROCEDURE IF EXISTS GetUserBorrowReports;");
        DB::unprepared("DROP PROCEDURE IF EXISTS GetAllBorrowReports;");
    }
}
