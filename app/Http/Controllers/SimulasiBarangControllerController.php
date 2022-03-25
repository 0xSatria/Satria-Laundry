<?php

namespace App\Http\Controllers;

use App\Models\SimulasiBarangController;
use App\Http\Requests\StoreSimulasiBarangControllerRequest;
use App\Http\Requests\UpdateSimulasiBarangControllerRequest;

class SimulasiBarangControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('simulasi.index', [
            'title' => 'penjemputan'
        ]);
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
     * @param  \App\Http\Requests\StoreSimulasiBarangControllerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSimulasiBarangControllerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimulasiBarangController  $simulasiBarangController
     * @return \Illuminate\Http\Response
     */
    public function show(SimulasiBarangController $simulasiBarangController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimulasiBarangController  $simulasiBarangController
     * @return \Illuminate\Http\Response
     */
    public function edit(SimulasiBarangController $simulasiBarangController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSimulasiBarangControllerRequest  $request
     * @param  \App\Models\SimulasiBarangController  $simulasiBarangController
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSimulasiBarangControllerRequest $request, SimulasiBarangController $simulasiBarangController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimulasiBarangController  $simulasiBarangController
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimulasiBarangController $simulasiBarangController)
    {
        //
    }
}
