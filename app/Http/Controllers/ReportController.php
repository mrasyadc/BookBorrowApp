<?php

namespace App\Http\Controllers;

use App\Services\CalculationService;
use App\Services\ExportService;
use Artisaninweb\SoapWrapper\Facade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config as FacadesConfig;


class ReportController extends Controller
{

    protected $calculationService;
    protected $exportService;


    public function __construct(CalculationService $calculationService, ExportService $exportService)
    {
        $this->calculationService = $calculationService;
        $this->exportService = $exportService;
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

    public function allBorrowReportsExcel()
    {
        $reports = DB::select('CALL GetAllBorrowReports');

        // Add calculated field for each report
        foreach ($reports as $report) {
            $report->total_cost = $this->calculationService->multiply($report->total_days, $report->price_per_day);
        }

        // Convert reports to an array to dynamically extract headers
        $reportsArray = array_map(function ($report) {
            return (array) $report; // Cast each object to an array
        }, $reports);

        // Extract headers from the first report
        $headers = !empty($reportsArray) ? array_keys($reportsArray[0]) : [];

        // Add 'Total Cost' to the headers (if it doesn't already exist)
        if (!in_array('total_cost', $headers)) {
            $headers[] = 'total_cost';
        }

        // Export to Excel
        return $this->exportService->exportToExcel('AllBorrowReports.xlsx', $reportsArray, $headers);
    }

    public function allBorrowReportsPDF()
    {
        $reports = DB::select('CALL GetAllBorrowReports');

        // Add calculated field for each report
        foreach ($reports as $report) {
            $report->total_cost = $this->calculationService->multiply($report->total_days, $report->price_per_day);
        }

        // Convert reports to an array to dynamically extract headers
        $reportsArray = array_map(function ($report) {
            return (array) $report; // Cast each object to an array
        }, $reports);

        // Extract headers dynamically
        $headers = !empty($reportsArray) ? array_keys($reportsArray[0]) : [];

        // Add 'Total Cost' to the headers (if it doesn't already exist)
        if (!in_array('total_cost', $headers)) {
            $headers[] = 'total_cost';
        }

        return $this->exportService->exportToPdf('template.borrow', 'borrow_reports.pdf', $reportsArray, $headers);
    }

    public function userBorrowReports()
    {
        $user = Auth::user();
        $userId = $user->id;
        $reports = DB::select('CALL GetUserBorrowReports(?)', [$userId]);
        @dd($reports);
    }
}
