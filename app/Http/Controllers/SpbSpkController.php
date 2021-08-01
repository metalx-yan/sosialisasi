<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpkProduksi;
use App\SpbProduksi;

class SpbSpkController extends Controller
{
    public function all()
    {
        $spk = SpkProduksi::all();
        $spb = SpbProduksi::all();
        // dd($spb);
        return view('produksis.spbspk',compact('spk','spb'));
    }
}
