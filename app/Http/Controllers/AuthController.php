<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'app' => 'required|string|max:255',
            'apm' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contraseña' => 'required|string|min:8|confirmed',
            'telefono' => 'required|string|max:15',
            'fn' => 'required|date',
        ]);

        // Crear el usuario en la base de datos
        $user = new User([
            'nombre' => $request->nombre,
            'app' => $request->app,
            'apm' => $request->apm,
            'email' => $request->email,
            'contraseña' => Hash::make($request->contraseña),
            'telefono' => $request->telefono,
            'fn' => $request->fn,
        ]);

        $user->save();

        // Autenticar al usuario después del registro
        auth()->login($user);

        return redirect('/dashboard')->with('success', '¡Registro exitoso!');
    }
}
