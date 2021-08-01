<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProsesRetur;
use App\ReturPenjualan;
use App\SpkProduksi;

class ProsesReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request,$id)
    {

        $user = ReturPenjualan::findOrFail($request->id);
        $user->mesin = $request->mesin;
        $user->planproduksi = $request->produksi;
        $user->save();

        return redirect()->back();
    }

    public function spk()
    {
        $data = ReturPenjualan::where('status', 1)->get();
        // $d1 = SpkProduksi::where('retur_penjualan_id', 1)->first();
        // dd($d1->status);
        return view('prosesreturs.spk',compact('data'));
    }

    public function proses(Request $request)
    {
        // dd($request->all(), $request->id);
        ProsesRetur::create([
            'po' => $request->po,
            'tanggal' => $request->tanggal,
            'retur' => $request->retur,
            'customer' => $request->customer,
            'qty' => $request->qty,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan,
            'barang_id' => $request->barang_id,
            'status' => 0,
            'retur_penjualan_id' => $request->id
        ]);

        $user = ReturPenjualan::findOrFail($request->id);
        $user->status = 2;
        $user->save();

        return redirect()->route('returpenjualan.index');
    }

    public function prosesacc(Request $request,$id)
    {
        // dd($request->all());
        $user = ProsesRetur::findOrFail($request->id);
        $user->status = 1;
        $user->save();
        $user = ReturPenjualan::findOrFail($request->retur_penjualan_id);
        $user->status = 1;
        $user->save();
        return redirect()->back();
    }

    public function prosesdec(Request $request,$id)
    {
        // dd($request->all());
        $user = ProsesRetur::findOrFail($request->id);
        $user->status = 2;
        $user->save();
        $user = ReturPenjualan::findOrFail($request->retur_penjualan_id);
        $user->status = 0;
        $user->save();
        return redirect()->back();
    }

    public function index()
    {
        $data = ProsesRetur::all();
        // dd($data);
        return view('prosesreturs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
