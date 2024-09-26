<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
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

    public function autenticar(AuthRequest $request)
    {
        // $credenciales = ['email'=>$request->email,'password'=>$request->password];
        $credenciales = $request->validated();
        $remember = $request->has('remember');

        if (Auth::attempt($credenciales, $remember)) {
            //credenciales correctas
            $request->session()->regenerate();
            return redirect()->route('home.index');
        }
        return back()->withErrors('Las credenciales ingresadas son incorrectas.')->onlyInput('email');
    }
}
