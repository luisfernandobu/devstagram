<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validacion
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users|min:5|max:25|alpha_dash',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        // hashear password
        $sPasswordHashed = Hash::make($request->password);

        // guardar nuevo usuario
        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => $sPasswordHashed
        ]);

        // autenticar usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // otra forma de autenticar usuario
        auth()->attempt($request->only('email', 'password'));

        // redireccionar al usuario
        return redirect()->route('posts.index', ['user' => auth()->user()->username]);
    }
}
