<?php

namespace App\Http\Controllers;

use App\Angkatan;
use Illuminate\Http\Request;
use Validator;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $data['angkatan'] = Angkatan::all();
        return view('angkatan.index', $data)->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('angkatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'angkatan' => 'required',
        ]);

        Angkatan::create($request->all());
        return redirect('angkatan')->with('sukses','Data Angkatan Berhasil Ditambahkan!');

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
        $data['angkatan'] = Angkatan::find($id);
        return view('angkatan.edit', $data);
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
        $data = Angkatan::find($id);
        $data->angkatan = $request->angkatan;
        $data->update();
        return redirect('angkatan')->with('sukses', 'Data Berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $data = Angkatan::find($id);
          $data->delete();
          return redirect('angkatan')->with('hapus', 'Data Berhasil dihapus');
  
    }
}
