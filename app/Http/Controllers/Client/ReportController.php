<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function export(Request $request)
    {

        $data = '{"Activ": "III. Необоротные активы, удерживаемые для продажи, и группы выбытия","Kod_stroki": 1322,"Na_nachalo_otchetnogo_perioda": 123,"Na_konec_otchetnogo_perioda": ""}';
        return response(json_decode($data,true));
        //return response($request->getContent());
    }
}
