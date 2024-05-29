<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industri;
use App\Models\Jurusan;


class IndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industri = Industri::with('jurusan')->latest()->paginate(10);
        return view('industri.index', compact('industri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $jurusan = Jurusan::all();
        return view('industri.create', compact("jurusan"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_industri' => 'required',
            'alamat' => 'required',
            'tahun_kerjasama' => 'required|min:1|max:1000',
            'id_jurusan' => 'required|',
        ]);

        $industri = new Industri();
        $industri->nama_industri = $request->nama_industri;
        $industri->alamat = $request->alamat;
        $industri->tahun_kerjasama = $request->tahun_kerjasama;
        $industri->id_jurusan = $request->id_jurusan;
        
        $industri->save();
        return redirect()->route('industri.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $industri = Industri::findOrFail($id);
        return view('industri.show', compact('industri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $industri = Industri::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('industri.edit', compact('industri','jurusan'));
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
        $this->validate($request, [
            'nama_industri' => 'required',
            'alamat' => 'required',
            'tahun_kerjasama' => 'required|min:1|max:1000',
            'id_jurusan' => 'required|',
        ]);

        $industri = Industri::findOrfail($id);
        $industri->nama_industri = $request->nama_industri;
        $industri->alamat = $request->alamat;
        $industri->tahun_kerjasama = $request->tahun_kerjasama;
        $industri->id_jurusan = $request->id_jurusan;
        
        $industri->save();
        return redirect()->route('industri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industri = Industri::findOrFail($id);
        $industri->delete();
        return redirect()->route('industri.index');
    }
}
