<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Reports\ReportLocalController;
class ChooseView extends Controller
{
    public function change()
    {
        if(Auth::user()->hasRole('user'))
        {
            return redirect('create_monthly');
        }
        if(Auth::user()->hasRole('admin'))
            return view('dashboard');
    }
}
