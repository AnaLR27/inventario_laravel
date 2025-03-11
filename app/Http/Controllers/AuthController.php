<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('productos');
        }
        return back()->withErrors(['name' => 'Credenciales incorrectas']);
    }

    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('login')->with('success', 'Registro exitoso, inicia sesión');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}