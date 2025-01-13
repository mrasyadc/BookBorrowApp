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

    public function allBorrowReports()
    {
        // For all users
        $reports = DB::select('CALL GetAllBorrowReports');
        // @dd($reports);
        // For specific user
        return view('admin.report.report', ['reports' => $reports]);
    }

    public function userBorrowReports(Request $request)
    {
        $userId = $request->route(userId);
        $reports = DB::select('CALL GetUserBorrowReports(?)', [$userId]);
        @dd($reports);
    }
}
