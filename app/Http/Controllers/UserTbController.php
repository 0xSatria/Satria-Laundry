<?php

namespace App\Http\Controllers;

use App\Models\user_tb;
use App\Http\Requests\Storeuser_tbRequest;
use App\Http\Requests\Updateuser_tbRequest;

class UserTbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storeuser_tbRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_tbRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_tb  $user_tb
     * @return \Illuminate\Http\Response
     */
    public function show(user_tb $user_tb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_tb  $user_tb
     * @return \Illuminate\Http\Response
     */
    public function edit(user_tb $user_tb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_tbRequest  $request
     * @param  \App\Models\user_tb  $user_tb
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_tbRequest $request, user_tb $user_tb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_tb  $user_tb
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_tb $user_tb)
    {
        //
    }
}
