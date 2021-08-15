<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemulung;
use App\Kelurahan;
use App\Kecamatan;

class PemulungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pemulung::all();

        return view('pemulungs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('pemulungs.create',compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keca = [];
        foreach (Kecamatan::all() as $kec) {
            if ($kec->id == $request->kecamatan) {
                $keca[] = $kec->name;
            }
        }

        $kelu = [];
        foreach (Kelurahan::all() as $kel) {
            if ($kel->id == $request->kelurahan) {
                $kelu[] = $kel->name;
            }
        }

        $vali = $request->validate([
            'kode' => 'required',
            'kecamatan'  => 'required',
            'kelurahan'  => 'required',
            'tahun'  => 'required',
            'nama'  => 'required',
            'orangtua'  => 'required',
            'nik'  => 'required',
            'tempat'  => 'required',
            'tanggal'  => 'required',
            'jenis_kelamin'  => 'required',
            'alamat'  => 'required',
            'pelayanan'  => 'required'
        ]);

        Pemulung::create([
            'kode' => $request->kode,
            'kecamatan'  => $keca[0],
            'kelurahan'  => $kelu[0],
            'tahun'  => $request->tahun,
            'nama'  => $request->nama,
            'orangtua'  => $request->nama,
            'nik'  => $request->nik,
            'tempat'  => $request->tempat,
            'tanggal'  => $request->tanggal,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'alamat'  => $request->alamat,
            'pelayanan'  => $request->pelayanan
        ]);

        return redirect()->route('pemulung.index');
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
        $get = Pemulung::find($id);
        $kecamatan = Kecamatan::all();
        return view('pemulungs.edit', compact('get','kecamatan'));
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
        $keca = [];
        foreach (Kecamatan::all() as $kec) {
            if ($kec->id == $request->kecamatan) {
                $keca[] = $kec->name;
            }
        }

        $kelu = [];
        foreach (Kelurahan::all() as $kel) {
            if ($kel->id == $request->kelurahan) {
                $kelu[] = $kel->name;
            }
        }

        $vali = $request->validate([
            'kode' => 'required',
            'kecamatan'  => 'required',
            'kelurahan'  => 'required',
            'tahun'  => 'required',
            'nama'  => 'required',
            'orangtua'  => 'required',
            'nik'  => 'required',
            'tempat'  => 'required',
            'tanggal'  => 'required',
            'jenis_kelamin'  => 'required',
            'alamat'  => 'required',
            'pelayanan'  => 'required'
        ]);

        $update = Pemulung::findOrFail($id);
        $update->kode = $request->kode;
        $update->kecamatan = $keca[0];
        $update->kelurahan = $kelu[0];
        $update->tahun = $request->tahun;
        $update->nama = $request->nama;
        $update->orangtua = $request->orangtua;
        $update->nik = $request->nik;
        $update->tempat = $request->tempat;
        $update->tanggal = $request->tanggal;
        $update->jenis_kelamin = $request->jenis_kelamin;
        $update->alamat = $request->alamat;
        $update->pelayanan = $request->pelayanan;
        $update->save();

        return redirect()->route('pemulung.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Pemulung::find($id);
        $get->delete();

        return redirect()->back();
    }
}
