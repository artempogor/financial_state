<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportCreateController extends Controller
{
    public function create(Request $request)
    {

        $reports=$request->input('report');
        return view('user_tabs.reports.monthly.monthly')->with(['reports'=>$reports]);
    }
    public function createLocal(Request $request)
    {
        switch (request('button')){
            case'create':
                $reports=$request->input('reportsave');
                return view('user_tabs.reports.monthly.monthly')->with(['reports'=>$reports]);
                break;
            case 'clear':
                $deletedRows = Report::where('name_report',$reports=$request->input('reportsave'))
                    ->where('ikul',Auth::user()->ikul)
                    ->delete();
                $reports=$request->input('reportsave');
                return redirect()->back();
            break;
        }
    }
}
