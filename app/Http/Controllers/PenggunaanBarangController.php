<?php

namespace App\Http\Controllers;

use App\Exports\PenggunaanBarangExport;
use App\Models\PenggunaanBarang;
use Illuminate\Http\Request;
use App\Http\Requests\StorePenggunaanBarangRequest;
use App\Http\Requests\UpdatePenggunaanBarangRequest;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\PenggunaanBarangImport;
use Illuminate\Support\Facades\Response as FacadesResponse;

class PenggunaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['penggunaanbarang'] = PenggunaanBarang::all();
        return view('penggunaanbarang.index', [
            'title' => 'penggunaanbarang'
        ])->with($data);
    }

    public function status(Request  $request)
    {
        $data = PenggunaanBarang::where('id', $request->id)->first();
        $data->status = $request->status;
        $data->waktu_selesai_pakai = now();
        $update = $data->save();

        return 'Data Gagal Ditarik';
    }


    public function downloadTemplate()
    {
        return FacadesResponse::download(public_path() . "/TemplateExcel/template-import.xlsx");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenggunaanBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenggunaanBarangRequest $request)
    {
        // Validasi
        $validated = $request->validate([
            'nama_barang' => 'required',
            'waktu_pakai' => 'required',
            'nama_pemakai' => 'required',
            'status' => 'required'
        ]);

        $input = PenggunaanBarang::create($validated);

        if ($input) return redirect('#')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenggunaanBarangRequest  $request
     * @param  \App\Models\PenggunaanBarang  $penggunaanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenggunaanBarangRequest $request, $id)
    {
        $rules = $request->validate([
            'nama_barang' => 'required',
            'waktu_pakai' => 'required',
            'nama_pemakai' => 'required',
        ]);

        $update = PenggunaanBarang::find($id)->update($request->all());

        if ($update) return redirect(request()->segment(1) . '/penggunaanbarang')->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenggunaanBarang  $penggunaanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PenggunaanBarang::find($id)->delete();
        return redirect(request()->segment(1) . '/penggunaanbarang')->with('success', 'Data Berhasil dihapus');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new PenggunaanBarangExport, $date . '_barang.xlsx');
    }

    public function importData()
    {
        Excel::import(new PenggunaanBarangImport, request()->file('file'));
        return redirect(request()->segment(1) . '/penggunaanbarang')->with('success', 'Data Berhasil diimport');
    }

    public function exportPDF()
    {
        $pdf = Pdf::loadView('penggunaanbarang.pdf', [
            'penggunaanbarang' => PenggunaanBarang::all()
        ]);

        return $pdf->stream();
    }
}
