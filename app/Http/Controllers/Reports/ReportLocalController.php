<?php

namespace App\Http\Controllers\Reports;
Use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportLocalController extends Controller
{
    public function save(Request $request)
    {

        $report = Report::updateOrCreate(
            ['ikul' => $request->input('info.0.INN'), 'name_report' => $request->input('info.0.FORM')],
            ['data' => Arr::except($request->input(),['info'])]
        );
          return response('ok',200);
    }
    public function load($ikul, $name_report)
    {
        $report = Report::where('ikul',$ikul)
            ->where('name_report',$name_report)
            ->orderByDesc('updated_at')
            ->limit(1)
            ->value('data');
        return ([$report]);
    }
}
