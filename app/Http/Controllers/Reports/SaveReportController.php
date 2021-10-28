<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaveReportController extends Controller
{
    public function save(Request $request)
    {
        return response()->json($request->getContent());
    }
}
