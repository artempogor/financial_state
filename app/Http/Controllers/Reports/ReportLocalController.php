<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportLocalController extends Controller
{
    public function save(Request $request)
    {
        $report = Report::updateOrCreate(
            ['ikul' => $request->input('ikul'), 'name_report' => $request->input('name_report')],
            ['data1' => $request->input('data1'),'data2' => $request->input('data2')]
        );
          return response('ok',200);
    }
    public function load($ikul, $name_report)
    {
        $report1 = Report::where('ikul',$ikul)
            ->where('name_report',$name_report)
            ->orderByDesc('updated_at')
            ->limit(1)
            ->value('data1');
        $report2 = Report::where('ikul',$ikul)
            ->where('name_report',$name_report)
            ->orderByDesc('updated_at')
            ->limit(1)
            ->value('data2');
        return ([$report1,$report2]);
    }
}
