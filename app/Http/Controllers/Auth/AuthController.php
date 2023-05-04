<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginIndex() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        $user = User::whereEmail($request->email)->first();
        if ($user) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
                $user->remember_token = Str::random(15);
                $user->save();
                return redirect()->route('home');
            } else {
                return back()->with('error', 'Credenciales incorrectas');
            }
        } else {
            return back()->with('error', 'Usuario no encontrado');
        }
    }
}
