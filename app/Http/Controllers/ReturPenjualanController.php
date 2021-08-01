<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReturPenjualan;
use App\ProsesRetur;
use App\SpbProduksi;

class ReturPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function spb()
    {
        $data = ReturPenjualan::where('status', 1)->get();
        // $d1 = SpbProduksi::where('proses_retur_id', 1)->first();
        // dd($d1->status);

        return view('returs.spb', compact('data'));
    }

    public function index()
    {
        $data = ReturPenjualan::all();
        return view('returs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('returs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all(), $request->harga_jual * $request->qty);
        $vali = $request->validate([
            'po' => 'required',
            'tanggal' => 'required',
            'retur' => 'required',
            'customer' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
            'harga_jual' => 'required',
            'barang_id'  =>  'required',
        ]);

        ReturPenjualan::create([
            'po' => $request->po,
            'tanggal' => $request->tanggal,
            'retur' => $request->retur,
            'customer' => $request->customer,
            'qty' => $request->qty,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan,
            'harga_jual' => $request->harga_jual,
            'total' => $request->harga_jual * $request->qty,
            'barang_id' => $request->barang_id
        ]);

        return redirect()->route('returpenjualan.index');
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
        $get = ReturPenjualan::find($id);

        return view('returs.edit', compact('get'));
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
        $vali = $request->validate([
            'po' => 'required',
            'tanggal' => 'required',
            'retur' => 'required',
            'customer' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
            'harga_jual' => 'required',
            'barang_id'  =>  'required',
        ]);

        $user               = ReturPenjualan::findOrFail($id);
        $user->po           = $request->po;
        $user->tanggal      = $request->tanggal;
        $user->retur        = $request->retur;
        $user->customer     = $request->customer;
        $user->qty          = $request->qty;
        $user->satuan       = $request->satuan;
        $user->keterangan   = $request->keterangan;
        $user->harga_jual   = $request->harga_jual;
        $user->barang_id    = $request->barang_id;
        $user->total        = $request->harga_jual * $request->qty;
        $user->status       = 3;
        $user->save();

        $user = ProsesRetur::findOrFail($id);
        $user->delete();
        return redirect()->route('returpenjualan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = ReturPenjualan::find($id);
        $find->delete();

        return redirect()->back();
    }
}
