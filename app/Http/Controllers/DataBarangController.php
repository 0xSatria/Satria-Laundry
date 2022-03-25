<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Http\Requests\StoreDataBarangRequest;
use App\Http\Requests\UpdateDataBarangRequest;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['databarang'] = DataBarang::all();
        return view('databarang.index', [
            'title' => 'databarang'
        ])->with($data);
    }

    public function status(Request $request)
    {
        $data = DataBarang::where('id', $request->id)->first();
        $data->status = $request->status;
        $update = $data->save();

        return 'Data Gagal Ditarik';
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
     * @param  \App\Http\Requests\StoreDataBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataBarangRequest $request)
    {
        // Validasi
        $validated = $request->validate([
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'waktu_beli' => 'required',
            'supplier' => 'required',
            'status' => 'required'
        ]);

        $input = DataBarang::create($validated);

        if ($input) return redirect('#')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function show(DataBarang $dataBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(DataBarang $dataBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataBarangRequest  $request
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataBarangRequest $request, $id)
    {
        $rules = $request->validate([
            'nama_barang' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'waktu_beli' => 'required',
            'supplier' => 'required',
            'status' => 'required'
        ]);

        $update = DataBarang::find($id)->update($request->all());

        if ($update) return redirect(request()->segment(1) . '/databarang')->with('success', 'Data Berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataBarang::find($id)->delete();
        return redirect('a/databarang')->with('success', 'Data Berhasil dihapus');
    }
}
