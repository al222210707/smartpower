<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirigir al usuario al dashboard
            return redirect()->route('dashboard');
        } else {
            // Autenticación fallida, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
            return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }

    public function logout(Request $request)
    {
        // Cerrar sesión localmente en Laravel
        Auth::logout();

        // Redireccionar a la página de inicio
        return redirect()->route('home');
    }
}
