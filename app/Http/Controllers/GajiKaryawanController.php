<?php

namespace App\Http\Controllers;

use App\Models\GajiKaryawan;
use App\Http\Requests\StoreGajiKaryawanRequest;
use App\Http\Requests\UpdateGajiKaryawanRequest;

class GajiKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('simulasibarang/index');
        // return view('gaji/index');
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
     * @param  \App\Http\Requests\StoreGajiKaryawanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGajiKaryawanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GajiKaryawan  $gajiKaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(GajiKaryawan $gajiKaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GajiKaryawan  $gajiKaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(GajiKaryawan $gajiKaryawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGajiKaryawanRequest  $request
     * @param  \App\Models\GajiKaryawan  $gajiKaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGajiKaryawanRequest $request, GajiKaryawan $gajiKaryawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GajiKaryawan  $gajiKaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(GajiKaryawan $gajiKaryawan)
    {
        //
    }
}
