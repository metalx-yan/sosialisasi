<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use Request as Req;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Req as ReqResouce;

class ApiController extends Controller
{
    public function kelurahan()
    {
        $id = Req::input('kecamatan_id');
        $kelurahan = Kelurahan::where('kecamatan_id', $id)->get();

        return response()->json($kelurahan);
    }

    public function kelurahanAll()
    {
        $kel = Kelurahan::all();

        return response()->json($kel);
    }
}
