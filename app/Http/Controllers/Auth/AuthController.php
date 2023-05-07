<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginIndex() {
        return view('auth.login');
    }
    public function registerIndex() {
        return view('auth.register');
    }

    public function login(Request $request) {
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'string'],
            ]);
            $user = User::whereEmail($request->email)->first();
            if ($user) {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
                    $user->remember_token = Str::random(15);
                    $user->save();
                    $route = $user->type == 1 ? 'home' : 'shop.index';
                    return redirect()->route($route);
                } else {
                    return back()->with('error', 'Credenciales incorrectas');
                }
            } else {
                return back()->with('error', 'Usuario no encontrado');
            }
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function register(Request $request) {
        try {
            $validate = $request->validate([
                'name'     => 'required|string',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
                'address'  => 'required|string',
                'phone'    => 'required',
                'type'     => 'required'
            ]);
            $validate['password'] = Hash::make($request->password);
            $user = User::create($validate);
            if ($user) {
                return redirect()->route('login.index')->with('success', 'Cuenta creada, por favor inicia sesión');
            } else {
                return back()->with('error', 'No se pudo crear la cuenta');
            }
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
