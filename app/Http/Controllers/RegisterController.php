<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use App\Models\User;
use App\Models\user_tb;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.signup', [
            'id_outlet' => outlet::all(),
            'roles' => config('roles.role'),
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'id_outlet' => 'required',
            'role' => 'required',
            'password' => 'required|min:5|max:30',
        ]);

        $register = user_tb::create($data);

        if ($register) {
            return redirect()->route('user.index')->with('success', 'Register berhasil ya adik adik, silakan login');
        } else {
            return redirect()->back()->with('error', 'Register berhasil ya adik adik, silakan login');
        }
    }
}
