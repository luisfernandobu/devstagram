<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        // validacion
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users|min:5|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        dd('Creando usuario...');
    }
}
