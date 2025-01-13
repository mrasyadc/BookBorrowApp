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
                bt.planned_return_date,
                bt.actual_return_date,
                bt.total_cost,
                -- Calculate total days based on the described logic
                CASE
                    WHEN bt.actual_return_date IS NOT NULL THEN
                        DATEDIFF(bt.actual_return_date, bt.borrow_date)
                    WHEN bt.actual_return_date IS NULL AND CURDATE() <= bt.planned_return_date THEN
                        DATEDIFF(bt.planned_return_date, bt.borrow_date)
                    ELSE
                        DATEDIFF(CURDATE(), bt.borrow_date)
                END AS total_days,
                -- Calculate if the report is late or on time
                CASE
                    WHEN bt.actual_return_date IS NULL THEN
                        CASE
                            WHEN CURDATE() > bt.planned_return_date THEN 'Late'
                            ELSE 'On Time'
                        END
                    WHEN bt.actual_return_date > bt.planned_return_date THEN 'Late'
                    ELSE 'On Time'
                END AS status
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
                bt.planned_return_date,
                bt.actual_return_date,
                bt.total_cost,
                -- Calculate total days based on the described logic
                CASE
                    WHEN bt.actual_return_date IS NOT NULL THEN
                        DATEDIFF(bt.actual_return_date, bt.borrow_date)
                    WHEN bt.actual_return_date IS NULL AND CURDATE() <= bt.planned_return_date THEN
                        DATEDIFF(bt.planned_return_date, bt.borrow_date)
                    ELSE
                        DATEDIFF(CURDATE(), bt.borrow_date)
                END AS total_days,
                -- Calculate if the report is late or on time
                CASE
                    WHEN bt.actual_return_date IS NULL THEN
                        CASE
                            WHEN CURDATE() > bt.planned_return_date THEN 'Late'
                            ELSE 'On Time'
                        END
                    WHEN bt.actual_return_date > bt.planned_return_date THEN 'Late'
                    ELSE 'On Time'
                END AS status
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
