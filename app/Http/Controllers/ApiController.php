<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requestt;
use Request as Req;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Req as ReqResouce;

class ApiController extends Controller
{
    public function keluar(Request $request)
    {        
        $id = Req::input('id');
        $keluar = ReqResouce::collection(Requestt::where('id', $id)->get());

        return response()->json($keluar);
    }
}
