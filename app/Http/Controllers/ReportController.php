<?php

namespace App\Http\Controllers;

use App\Services\CalculationService;
use Artisaninweb\SoapWrapper\Facade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config as FacadesConfig;


class ReportController extends Controller
{

    protected $calculationService;

    public function __construct(CalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }
    //
    public function index()
    {
        return view('admin.report.report');
    }

    public function allBorrowReports()
    {
        // For all users
        $reports = DB::select('CALL GetAllBorrowReports');
        foreach ($reports as $report) {
            $report->total_cost = $this->calculationService->multiply($report->total_days, $report->price_per_day);
        }
        return view('admin.report.report', ['reports' => $reports]);
    }

    public function userBorrowReports(Request $request)
    {
        $userId = $request->route(userId);
        $reports = DB::select('CALL GetUserBorrowReports(?)', [$userId]);
        @dd($reports);
    }
}
