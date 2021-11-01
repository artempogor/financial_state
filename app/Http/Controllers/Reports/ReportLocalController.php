<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportLocalController extends Controller
{
    public function save(Request $request)
    {
//          $report=new Report();
//          $report->data=$request->input('data');
//          $report->name_report = '0101';
//          $report->ikul = $request->input('ikul');
//          $report->save();
        $report = Report::updateOrCreate(
            ['data' => $request->input('data'), 'name_report' => '0101'],
            ['ikul' => $request->input('ikul')]
        );
          return response('ok',200);
    }
    public function load()
    {
        $report = Report::where('ikul',1234)
            ->orderByDesc('updated_at')
            ->limit(1)
            ->value('data');
        return response($report);
    }
}
