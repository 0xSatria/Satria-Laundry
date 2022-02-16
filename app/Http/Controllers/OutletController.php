<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\request;
use App\Http\Requests\StoreoutletRequest;
use App\Http\Requests\UpdateoutletRequest;


class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['outlet'] = Outlet::all();
        return view('outlet/index', ['outlet' => Outlet::all()]);
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
     * @param  \App\Http\Requests\StoreoutletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreoutletRequest $request)
    {
        // Validasi
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
        ]);

        $input = outlet::create($validated);

        if ($input) return redirect('outlet')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateoutletRequest  $request
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutletRequest $request, $id)
    {
        $rules = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
        ]);

        $update = Outlet::find($id)->update($request->all());

        if ($update) return redirect('outlet')->with('success', 'Data Berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        outlet::find($id)->delete();
        return redirect('outlet')->with('success', 'Outlet dihapus');
    }
}
