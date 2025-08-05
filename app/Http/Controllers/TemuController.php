<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temu;

class TemuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temu = Temu::all();
        return view('Temu.index', compact('temu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temu = Temu::all();
        return view('Temu.addForm', compact('temu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $purpose = new Purpose();

        // $purpose->purpose_type=$request->purpose;
        // $purpose->save();

        $validate =  $request->validate([
            'temu_type' => 'required|string'
        ]);

        Temu::create($validate);

        return redirect()->route('temu.index')->with('status', 'Data Jenis Temu Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temu = Temu::find($id);
        return view('Temu.detailForm', compact('temu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $temu = Temu::find($id);
        return view('Temu.editForm', compact('temu'));
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
        // $purpose = Purpose::find($id);
        // $purpose->purpose_type=$request->purpose;
        // $purpose->save();

        $temu = Temu::find($id);

        $validate =  $request->validate([
            'temu_type' => 'required|string'
        ]);

        $temu->update($validate);

        return redirect()->route('temu.index')->with('status', 'Data Jenis Temu Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $temu = Temu::find($id);
        $temu->delete();

        return redirect()->route('temu.index')->with('status', 'Data Jenis Temu Berhasil Dihapus');
    }
}
