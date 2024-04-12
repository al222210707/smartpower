<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Importa el modelo User

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'app' => 'required|string|max:255',
            'apm' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telefono' => 'required|string|max:15',
            'fn' => 'required|date',
        ]);
        

        // Crear un nuevo usuario
        $user = User::create([
            'nombre' => $request->nombre,
            'app' => $request->app,
            'apm' => $request->apm,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telefono' => $request->telefono,
            'fn' => $request->fn,
        ]);
        //dd($request->all());
        // Autenticar al usuario recién registrado
        Auth::login($user);

        // Redireccionar al dashboard después del registro
        return redirect()->route('dashboard');
    }
}
