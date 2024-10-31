<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required' => 'O campo email é obrigatorio !',
            'email.email' => 'O campo email é invalido !',
            'password.required' => 'O campo senha é obrigatorio !',
        ]
        );

        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        else{
            return redirect()->back()->with('erro', 'Email ou senha invalidos !');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function redirectLogin(Request $request){
        return redirect('login');
    }
}
