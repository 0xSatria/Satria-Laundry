<?php

namespace App\Http\Controllers;

use App\Models\paket;
use App\Http\Requests\StorepaketRequest;
use App\Http\Requests\UpdatepaketRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaketExport;
use App\Imports\PaketImport;


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
    public function update(UpdatePaketRequest $request, $id)
    {
        $rules = $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required'
        ]);

        $update = Paket::find($id)->update($request->all());

        if ($update) return redirect('paket')->with('success', 'Data Berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        paket::find($id)->delete();
        return redirect('paket')->with('success', 'Paket dihapus');
    }

    // Export Function to Xls/Excel
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new PaketExport, $date . '_paket.xlsx');
    }

    // Import Xls
    public function importData()
    {
        // // validasi
        // $this->validate($request, [
        //     'file' => 'required|mimes:csv,xls,xlsx'
        // ]);

        // // menangkap file excel
        // $file = $request->file('file');

        // // membuat nama file unik
        // $nama_file = rand() . $file->getClientOriginalName();

        // // upload ke folder file_member di dalam folder public
        // $file->move('file_member', $nama_file);

        // import data
        Excel::import(new PaketImport, request()->file('import'));

        // notifikasi dengan session
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect(request()->segment(1) . '/paket')->with('success', 'Import berhasil!');
    }
}
