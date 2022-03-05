<?php

namespace App\Http\Controllers;

use App\Models\user_tb;
use App\Http\Requests\Storeuser_tbRequest;
use App\Http\Requests\Updateuser_tbRequest;
use Illuminate\Http\Request;

class UserTbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User_tb::all();
        return view('user/index', $data, [
            'title' => 'User'
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
     * @param  \App\Http\Requests\Storeuser_tbRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_tbRequest $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_outlet' => 'required',
            'role' => 'required',
        ]);

        $input = user_tb::create($validated);

        if ($input) return redirect('user')->with('success', 'Data berhasil diiinput');
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
    public function update(Updateuser_tbRequest $request, user_tb $user_tb, $id)
    {
        $model = User_tb::find($id);
        $model->nama = $request->nama;
        $model->username = $request->username;
        $model->password = $request->password;
        $model->id_outlet = $request->id_outlet;
        $model->role = $request->role;
        $model->save();

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_tb  $user_tb
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_tb $user_tb, $id)
    {
        User_tb::find($id)->delete();
        return redirect('user')->with('success', 'Data User dihapus');
    }
}
