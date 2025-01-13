<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function index()
    {
        return view('admin.report.report');
    }

    public function test()
    {
        // For all users
        $reports = DB::select('CALL GetAllBorrowReports');
        // @dd($reports);
        // For specific user
        $userId = 2;
        $reports = DB::select('CALL GetUserBorrowReports(?)', [$userId]);
        @dd($reports);
    }
}
