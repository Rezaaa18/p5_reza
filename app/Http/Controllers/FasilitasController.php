<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $fasilitas = Fasilitas::latest()->paginate(5);
        return view('fasilitas.index', compact('fasilitas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas.create');
        
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
            'nama' => 'required|min:2',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deksripsi' => 'required',
        ]);

        $fasilitas = new Fasilitas();
        $fasilitas->nama_fasilitas = $request->nama;
        $fasilitas->deksripsi = $request->deksripsi;
        

        $image = $request->file('image');
        $image->storeAs('public/fasilitas', $image->hashName());
        $fasilitas->image = $image->hashName();
        $fasilitas->save();
        return redirect()->route('fasilitas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('fasilitas.edit', compact('fasilitas'));
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
            'nama' => 'required|min:2',
            'deksripsi' => 'required',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->nama_fasilitas = $request->nama;
        $fasilitas->deksripsi = $request->deksripsi;
        

        $image = $request->file('image');
        $image->storeAs('public/fasilitas', $image->hashName());
        
        Storage::delete('public/fasilitas/' . $fasilitas->image);

        $fasilitas->image = $image->hashName();
        $fasilitas->save();
        return redirect()->route('fasilitas.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        Storage::delete('public/fasilitas/' . $fasilitas->image);
        $fasilitas->delete();
        return redirect()->route('fasilitas.index');
    }
}
