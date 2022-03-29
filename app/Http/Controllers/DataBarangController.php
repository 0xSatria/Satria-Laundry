<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Http\Requests\StoreDataBarangRequest;
use App\Http\Requests\UpdateDataBarangRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\BarangExport;
use App\Imports\BarangImport;
use Illuminate\Support\Facades\Response as FacadesResponse;

/**
 * Class DataBarangController
 * @package App\Http\Controllers
 */

class DataBarangController extends Controller
{
    /**
     * menampilkan halaman utama untuk barang
     * dengan memberikan data untuk databarang
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
        $data->waktu_update_status = now();
        $update = $data->save();

        return 'Data Gagal Ditarik';
    }


    /**
     * function untuk memperbarui status barang dan waktu update status
     */
    public function statusBarang(Request $request, $id)
    {
        $barang = DataBarang::find($id);
        $barang->status = $request->status;
        $barang->waktu_update_status = now();
        $barang->save();

        return redirect()->route('databarang.index')->with('success', 'Status barang berhasil diubah');
    }

    /**
     * Download template untuk import data penjemputan_laundry.
     *
     * @return \Illuminate\Support\Facades\Storage
     */
    public function downloadTemplate()
    {
        return FacadesResponse::download(public_path() . "/TemplateExcel/template-import2.xlsx");
    }

    /**
     * menyimpan data barang ke database
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
     * memperbarui data barang yang ada di database
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
            'supplier' => 'required'
        ]);

        $update = DataBarang::find($id)->update($request->all());

        if ($update) return redirect(request()->segment(1) . '/databarang')->with('success', 'Data Berhasil diupdate');
    }


    /**
     * menghapus data barang yang ada di database
     *
     * @param  \App\Models\DataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataBarang::find($id)->delete();
        return redirect('a/databarang')->with('success', 'Data Berhasil dihapus');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new BarangExport, $date . '_barang.xlsx');
    }

    public function importData()
    {
        Excel::import(new BarangImport, request()->file('file'));
        return redirect(request()->segment(1) . '/databarang')->with('success', 'Data Berhasil diimport');
    }

    // Export Function to PDF
    // Untuk meng-export data member menjadi file PDF
    public function exportPDF()
    {
        $pdf = Pdf::loadView('databarang.pdf', [
            'databarang' => DataBarang::all()
        ]);

        return $pdf->stream();
    }
}
