<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function autenticar(Request $request)
    {
        // $credenciales = ['email'=>$request->email,'password'=>$request->password];
        $credenciales = $request->only(['email', 'password']);

        if (Auth::attempt($credenciales)) {
            //credenciales correctas
            $request->session()->regenerate();
            return redirect()->route('home.index');
        }
        return back()->withErrors('Credenciales incorrectas :(')->onlyInput('email');
    }
}
