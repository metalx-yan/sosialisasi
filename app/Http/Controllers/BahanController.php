<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahan;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bahan::all();
        return view('bahans.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vali = $request->validate([
            'bahan' => 'required|string',
            'qty' => 'required|string',
            'barang_id'  =>  'required|numeric',
        ]);

        Bahan::create($vali);

        return redirect()->route('bahan.index');
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
        $get = Bahan::find($id);

        return view('bahans.edit', compact('get'));
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
            'bahan' => 'required|string',
            'qty' => 'required|string',
            'barang_id'  =>  'required|numeric',
        ]);

        $user           = Bahan::findOrFail($id);
        $user->bahan     = $request->bahan;
        $user->qty     = $request->qty;
        $user->barang_id     = $request->barang_id;
        $user->save();

        return redirect()->route('bahan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Bahan::find($id);
        $find->delete();

        return redirect()->back();
    }
}
