<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginControler extends Controller
{
    public function index()
    {
        return view('login.index');
    }
}
