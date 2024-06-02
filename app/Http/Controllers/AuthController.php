<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('dashboard.login');
    }

    public function login(Request $request) {
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Verifica si el usuario está activo antes de permitir iniciar sesión
            if (Auth::user()->state == 0) {
                Auth::logout(); // Cerrar sesión para un usuario inactivo
                return redirect()->route('login')->with('error', 'Tu cuenta está desactivada.');
            }

            return redirect()->intended('users');
        }

        return redirect()->route('login')->with('error', 'Credenciales inválidas.');
    }

    public function logout(Request $request) {
        // Agregar declaración de depuración para verificar si el método se está ejecutando correctamente
        \Log::info('Cierre de sesión iniciado');

        Auth::logout();

        // Agregar declaración de depuración para verificar si el usuario se desconectó correctamente
        \Log::info('Usuario desconectado');

        $request->session()->invalidate();

        // Agregar declaración de depuración para verificar si la sesión se invalidó correctamente
        \Log::info('Sesión invalidada');

        $request->session()->regenerateToken();

        // Agregar declaración de depuración para verificar si el token CSRF se regeneró correctamente
        \Log::info('Token CSRF regenerado');

        // Redirigir al usuario a la página de inicio después de cerrar sesión
        return redirect('/');
    }
}