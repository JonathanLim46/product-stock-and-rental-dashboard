<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Illuminate\Http\Request;

class PelangganController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('dashboard_view.pelanggan',[
            'pelanggans' => $pelanggans,
            'title' => 'Pelanggan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'nomor_pelanggan' => 'required'
        ]);

        $data = $request->nama_pelanggan;
        $cekData = Pelanggan::where('nama_pelanggan',$data)->value('id');

        if($cekData){
            return back()->with('error',"Data Pelanggan '$data' sudah terdaftar");
        }else{
            Pelanggan::create([
                'nama_pelanggan' => $request->nama_pelanggan,
                'alamat_pelanggan' => $request->alamat_pelanggan,
                'nomor_pelanggan' => $request->nomor_pelanggan
            ]);
        }

        return to_route('pelanggan.index')->with('success', "Data Pelanggan '$data' berhasil ditambahkan");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('input_view.inputPelanggan',[
            'title' => 'Pelanggan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan){
        return view('input_view.inputPelanggan',[
            'title' => 'Pelanggan',
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelangganName = $pelanggan->nama_pelanggan;
        $pelanggan->delete();

        return to_route('pelanggan.index')->with('deleteSuccess', "Data Pelanggan : '$pelangganName' Berhasil di Delete ");
    }
}
