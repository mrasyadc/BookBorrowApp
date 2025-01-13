<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;

class ExportService
{
    /**
     * Export data to Excel.
     *
     * @param string $fileName
     * @param Collection|array $data
     * @param array $headers
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportToExcel(string $fileName, $data, array $headers)
    {
        return Excel::download(new class($data, $headers) implements \Maatwebsite\Excel\Concerns\FromCollection, \Maatwebsite\Excel\Concerns\WithHeadings {
            private $data;
            private $headers;

            public function __construct($data, $headers)
            {
                $this->data = $data;
                $this->headers = $headers;
            }

            public function collection()
            {
                return collect($this->data);
            }

            public function headings(): array
            {
                return $this->headers;
            }
        }, $fileName);
    }

    /**
     * Export data to PDF.
     *
     * @param string $view
     * @param array $data
     * @param string $fileName
     * @return \Illuminate\Http\Response
     */
    public function exportToPdf(string $view, array $data, string $fileName)
    {
        $pdf = Pdf::loadView($view, $data);
        return $pdf->download($fileName);
    }
}
