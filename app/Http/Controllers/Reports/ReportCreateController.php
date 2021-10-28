<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportCreateController extends Controller
{
    public function create(Request $request)
    {
        $reports=$request->input('report');
        return view('user_tabs.reports.monthly')->with(['reports'=>$reports]);
    }
}
