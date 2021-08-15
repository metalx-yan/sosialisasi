<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Psikologis;
use App\Kecamatan;
use App\Kelurahan;

class PsikologisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Psikologis::all();

        return view('psikologis.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('psikologis.create', compact('kecamatan'));
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
            'nik'  => 'required',
            'tempat'  => 'required',
            'tanggal'  => 'required',
            'jenis_kelamin'  => 'required',
            'pendidikan'  => 'required',
            'alamat'  => 'required',
            'pelayanan'  => 'required',
        ]);

        Psikologis::create([
            'kode' => $request->kode,
            'kecamatan'  => $keca[0],
            'kelurahan'  => $kelu[0],
            'tahun'  => $request->tahun,
            'nama'  => $request->nama,
            'nik'  => $request->nik,
            'tempat'  => $request->tempat,
            'tanggal'  => $request->tanggal,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'pendidikan'  => $request->pendidikan,
            'alamat'  => $request->alamat,
            'pelayanan'  => $request->pelayanan,
            'keterangan'  => $request->keterangan,
        ]);


        return redirect()->route('psikologis.index');
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
        $get = Psikologis::find($id);
        $kecamatan = Kecamatan::all();

        return view('psikologis.edit', compact('get','kecamatan'));
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
            'nik'  => 'required',
            'tempat'  => 'required',
            'tanggal'  => 'required',
            'jenis_kelamin'  => 'required',
            'pendidikan'  => 'required',
            'alamat'  => 'required',
            'pelayanan'  => 'required',
        ]);

        $update = Psikologis::findOrFail($id);
        $update->kode = $request->kode;
        $update->kecamatan = $keca[0];
        $update->kelurahan = $kelu[0];
        $update->tahun = $request->tahun;
        $update->nama = $request->nama;
        $update->nik = $request->nik;
        $update->tempat = $request->tempat;
        $update->tanggal = $request->tanggal;
        $update->jenis_kelamin = $request->jenis_kelamin;
        $update->pendidikan = $request->pendidikan;
        $update->alamat = $request->alamat;
        $update->pelayanan = $request->pelayanan;
        $update->save();

        return redirect()->route('psikologis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Psikologis::find($id);
        $get->delete();

        return redirect()->back();
    }
}
