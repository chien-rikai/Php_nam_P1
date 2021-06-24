<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportStatistics;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function exportStatistics()
    {
        if(request()->has('date') && request()->has('month')) $date = request()->date.request()->month.date('Y');
        else $date = date('dmY');
        return Excel::download(new ExportStatistics(), 'statistics_'.$date.'.xls');
    }
}
