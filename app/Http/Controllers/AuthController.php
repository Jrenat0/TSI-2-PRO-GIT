<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\ForgotPasswordRequest;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;


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



    public function forgot()
    {
        return view('auth.forgot');
    }

    public function forgotEmail(ForgotPasswordRequest $request)
    {
        // Obtén el email del request
        $email = $request->input('email');

        // Busca el usuario por email
        $usuario = Usuario::where('email', $email)->first();

        // Verifica si el usuario no existe
        if ($usuario === null) {
            return back()->withErrors('No hemos podido encontrar nada relacionado al correo ingresado.');
        }

        // Redirige si el usuario fue encontrado
        return redirect()->route('auth.changePass',$usuario);
    }

    public function changePass(Usuario $usuario){
        return view('auth.change',compact('usuario'));
    }

    public function storePass(Usuario $usuario, ForgotPasswordRequest $request){
        $password = $request->password;

        $password2 = $request->password2;


        if ($password != $password2){
            return back()->withErrors('Las contraseñas ingresadas no coinciden entre si.');
        }

        $usuario->update(['password' => Hash::make($password)]);

        return redirect()->route('auth.login');

    }
}
