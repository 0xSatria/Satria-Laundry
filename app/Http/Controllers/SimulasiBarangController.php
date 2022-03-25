<?php

namespace App\Http\Controllers;

use App\Models\SimulasiBarang;
use App\Http\Requests\StoreSimulasiBarangRequest;
use App\Http\Requests\UpdateSimulasiBarangRequest;

class SimulasiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('simulasibarang/index');
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
     * @param  \App\Http\Requests\StoreSimulasiBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSimulasiBarangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimulasiBarang  $simulasiBarang
     * @return \Illuminate\Http\Response
     */
    public function show(SimulasiBarang $simulasiBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimulasiBarang  $simulasiBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(SimulasiBarang $simulasiBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSimulasiBarangRequest  $request
     * @param  \App\Models\SimulasiBarang  $simulasiBarang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSimulasiBarangRequest $request, SimulasiBarang $simulasiBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimulasiBarang  $simulasiBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimulasiBarang $simulasiBarang)
    {
        //
    }
}
