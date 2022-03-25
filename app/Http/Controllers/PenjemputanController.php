<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Penjemputan;
use App\Http\Requests\StorePenjemputanRequest;
use App\Http\Requests\UpdatePenjemputanRequest;
use App\Models\Detail_transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\MemberController;

class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['member'] = Member::get();
        $data['pemjemputan'] = Penjemputan::all();
        $data['paket'] = Paket::Where('id_outlet', auth()->user()->id_outlet)->get();
        return view('penjemputan.index', [
            'title' => 'penjemputan'
        ])->with($data);
    }

    public function status(Request $request)
    {
        $data = Penjemputan::where('id', $request->id)->first();
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
     * @param  \App\Http\Requests\StorePenjemputanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenjemputanRequest $request)
    {
        // Validasi
        $validated = $request->validate([
            'id_member' => 'required',
            'petugas' => 'required',
            'status' => 'required'
        ]);

        $input = Penjemputan::create($validated);

        if ($input) return redirect('#')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjemputan $penjemputan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjemputan $penjemputan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjemputanRequest  $request
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjemputanRequest $request, $id)
    {
        $rules = $request->validate([
            'petugas' => 'required',
            'status' => 'required'
        ]);

        $update = Penjemputan::find($id)->update($request->all());

        if ($update) return redirect('penjemputan')->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjemputan  $penjemputan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjemputan::find($id)->delete();
        return redirect('penjemputan')->with('success', 'Data dihapus');
    }
}
