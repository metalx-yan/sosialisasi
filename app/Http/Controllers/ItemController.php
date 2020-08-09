<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Item::all();
        return view('barang.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = $request->validate([
            'code'              =>  'required|unique:items|max:5|string',
            'name'              =>  'required|max:30',
            'stock'            =>  'required|numeric',
            'category_id'      =>  'required|numeric',
        ]);

        Item::create($store);

        return redirect()->route('barang.index');
        // dd($request->all());
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
        $get = Item::find($id);
        return view('barang.edit', compact('get'));
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
        $request->validate([
            'code'              =>  "required|unique:items,code,$id|max:5|string",
            'name'              =>  'required|max:30',
            'stock'            =>  'required|numeric',
            'category_id'      =>  'required|numeric',
        ]);

        $update = Item::findOrFail($id);
        $update->name = $request->name;
        $update->code = $request->code;
        $update->stock = $request->stock;
        $update->category_id = $request->category_id;
        $update->save();

        return redirect()->route('barang.index');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Item::find($id);
        $get->delete();

        return redirect()->back();
    }
}
