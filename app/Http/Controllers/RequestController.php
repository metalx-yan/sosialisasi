<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requestt;
use PDF;
use Carbon\Carbon;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(count($request->all()));
        if (count($request->all()) == 0) {            
            $all = Requestt::all();
        } else {
            $all = Requestt::whereBetween('date',array($request->from,$request->to))->get();
        }
        // dd($all);

        return view('purchasing.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchasing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $store = $request->validate([
            'date'              =>  'required|date',
            'total_masuk'       =>  'required|numeric',
            'total_keluar'       =>  'numeric',
            'description'        => 'string|nullable',
            'purchase_id'      =>  'required|numeric',
            'item_id'      =>  'required|numeric',
        ]);

        Requestt::create($store);

        return redirect()->route('request.index');
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
        $get = Requestt::find($id);

        return view('purchasing.edit', compact('get'));
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
        $store = $request->validate([            
            'total_masuk'              =>  'required|numeric',
            'date'              =>  'required|date',
            
            'purchase_id'      =>  'required|numeric',
            'item_id'      =>  'required|numeric',
        ]);

        $update = Requestt::findOrFail($id);
        $update->total_masuk = $request->total_masuk;
        $update->date = $request->date;
        $update->description = $request->description;
        $update->purchase_id = $request->purchase_id;
        $update->item_id = $request->item_id;
        $update->save();

        return redirect()->route('request.index');
    }

    public function acc(Request $request)
    {
        $all = Requestt::all();

        return view('manager.barang', compact('all'));
    }


    public function accpost(Request $request,$id)
    {
        $update                 = Requestt::findOrFail($id);
        $update->status         = 1;
        $update->updated_at     = Carbon::now()->format('Y-m-d');
        $update->save();

        return redirect()->back();
    }

    public function accpostdecline(Request $request,$id)
    {
        $update                 = Requestt::findOrFail($id);
        $update->status         = 2;
        $update->updated_at     = Carbon::now()->format('Y-m-d');
        $update->save();

        return redirect()->back();
    }

    public function pdf()
    {
        $pdf = PDF::loadView('invoice-pdf');
        return $pdf->download('invoice.pdf');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Requestt::find($id);
        $find->delete();

        return redirect()->back();
    }
}
