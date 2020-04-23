<?php

namespace App\Http\Controllers;

use App\Angkatan;
use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'))->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['angkatan'] =  Angkatan::all();
        return view('mahasiswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $inimahasiswa = new Mahasiswa();
        $inimahasiswa->nama = $request->nama;
        $inimahasiswa->angkatan_id = $request['angkatan_id'];
        $inimahasiswa->telepon = $request['telepon'];
        $inimahasiswa->tanggallahir = $request['tanggallahir'];
        $inimahasiswa->save();
        return redirect('mahasiswa')->with('sukses', 'Berhasil simpan data mahasiswa');

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
        $data['angkatan'] =  Angkatan::all();
        $data['mahasiswa'] = Mahasiswa::where('id', $id)->first();
        return view('mahasiswa.edit', $data);
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
        // return $request->all();
        $updatedata = Mahasiswa::where('id',$id)->first();
        $updatedata->nama = $request->nama;
        $updatedata->angkatan_id = $request['angkatan_id'];
        $updatedata->telepon = $request['telepon'];
        $updatedata->tanggallahir = $request['tanggallahir'];
        $updatedata->update();
        return redirect('mahasiswa')->with('sukses', 'Berhasil UPDATE data mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::where('id', $id)->delete();
        return redirect('mahasiswa')->with('hapus', 'Data berhasil dihapus!');
    }
}
