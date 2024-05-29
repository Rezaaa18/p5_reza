<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekskul;
use Illuminate\Support\Facades\Storage;


class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekskul = Ekskul::latest()->paginate(5);
        return view('ekskul.index', compact('ekskul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ekskul = Ekskul::all();
        return view('ekskul.create', compact("ekskul"));
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
            'ekskul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $ekskul = new Ekskul();
        $ekskul->ekskul = $request->ekskul;
        $ekskul->deskripsi = $request->deskripsi;
        

        $image = $request->file('image');
        $image->storeAs('public/ekskuls', $image->hashName());
        $ekskul->image = $image->hashName();
        $ekskul->save();
        return redirect()->route('ekskul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        return view('ekskul.show', compact('ekskul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        return view('ekskul.edit', compact('ekskul'));
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
            'ekskul' => 'required',
            'deskripsi' => 'required|min:5',
        ]);

        $ekskul = ekskul::findOrFail($id);
        $ekskul->ekskul = $request->ekskul;
        $ekskul->deskripsi = $request->deskripsi;
        

        $image = $request->file('image');
        $image->storeAs('public/ekskuls', $image->hashName());
        
        Storage::delete('public/ekskuls/' . $ekskul->image);

        $ekskul->image = $image->hashName();
        $ekskul->save();
        return redirect()->route('ekskul.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        Storage::delete('public/ekskuls/' . $ekskul->image);
        $ekskul->delete();
        return redirect()->route('ekskul.index');
    }
}
