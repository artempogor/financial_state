<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function export(Request $request)
    {
        $jsonString = file_get_contents(base_path('resources/test.json'));
        return $jsonString(json_decode($jsonString, true));
    }
    public function reportsFromApi()
    {
        $reports0101=Http::get('https://jsonplaceholder.typicode.com/posts');
        $reports = $reports0101;
        return (json_encode($reports,true));
    }
}
