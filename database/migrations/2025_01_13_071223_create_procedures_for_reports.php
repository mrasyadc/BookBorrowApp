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
                bt.id AS transaction_id,
                u.name AS borrower_name,
                u.email AS borrower_email,
                b.title AS book_title,
                b.author AS book_author,
                b.price_per_day,
                bt.borrow_date,
                bt.planned_return_date,
                bt.actual_return_date,
                -- Calculate total_days using planned_return_date or CURDATE() if overdue
                DATEDIFF(
                    GREATEST(IFNULL(bt.planned_return_date, CURDATE()), CURDATE()),
                    bt.borrow_date
                ) AS total_days,
                -- Calculate total_cost
                DATEDIFF(
                    GREATEST(IFNULL(bt.planned_return_date, CURDATE()), CURDATE()),
                    bt.borrow_date
                ) * b.price_per_day AS total_cost
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
                bt.id AS transaction_id,
                u.name AS borrower_name,
                u.email AS borrower_email,
                b.title AS book_title,
                b.author AS book_author,
                b.price_per_day,
                bt.borrow_date,
                bt.planned_return_date,
                bt.actual_return_date,
                -- Calculate total_days using planned_return_date or CURDATE() if overdue
                DATEDIFF(
                    GREATEST(IFNULL(bt.planned_return_date, CURDATE()), CURDATE()),
                    bt.borrow_date
                ) AS total_days,
                -- Calculate total_cost
                DATEDIFF(
                    GREATEST(IFNULL(bt.planned_return_date, CURDATE()), CURDATE()),
                    bt.borrow_date
                ) * b.price_per_day AS total_cost
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
