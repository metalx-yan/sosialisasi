<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kecamatan::all();
        $dat = Kecamatan::select(DB::raw('count(name) as `count`'),  DB::raw('MONTH(created_at) month'))
        ->groupby('month')
        ->get();

        $as = [];
        $asa = [];
        foreach ($dat as $value) {
            $as[] = $value->count;
            $asa[] = date("F", mktime(0, 0, 0, $value->month, 10));
        }

        // dd(json_encode($asa));

        return view('kecamatans.index',compact('data','as','asa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kecamatans.create');
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
            'name' => 'required',
        ]);

        Kecamatan::create($vali);

        return redirect()->route('kecamatan.index');
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
        $get = Kecamatan::find($id);
        return view('kecamatans.edit', compact('get'));
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
            'name'              =>  "required",
        ]);

        $update = Kecamatan::findOrFail($id);
        $update->name = $request->name;
        $update->save();

        return redirect()->route('kecamatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Kecamatan::find($id);
        $get->delete();

        return redirect()->back();
    }
}
