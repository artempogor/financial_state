<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function export(Request $request)
    {
        $jsonString = file_get_contents(base_path('resources/test.json'));
        return response(json_decode($jsonString, true));
    }
}
