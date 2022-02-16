<?php

namespace App\Http\Controllers;

use App\Models\paket;
use App\Http\Requests\StorepaketRequest;
use App\Http\Requests\UpdatepaketRequest;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['paket'] = Paket::all();
        return view('paket/index', ['paket' => Paket::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepaketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepaketRequest $request)
    {
        // Validasi
        $validated = $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required'
        ]);

        $input = paket::create($validated);

        if ($input) return redirect('#')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepaketRequest  $request
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepaketRequest $request, $id)
    {
        $model = Paket::find($id);
        $model->id_outlet = $request->id_outlet;
        $model->jenis = $request->jenis;
        $model->nama_paket = $request->nama_paket;
        $model->harga = $request->harga;
        $model->save();

        return redirect('paket')->with('success', 'Paket sudah diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paket::find($id)->delete();
        return redirect('paket')->with('success', 'Paket dihapus');
    }
}
