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
        ]);

    if(Auth::attempt($credenciais, $request->remember)){
        $request->session()->regenerate();
        return redirect()->intended('/home');
    }else {
        return redirect()->back();
    }

    }


    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login.form'));
    }


    public function create() {
        return view('login.create');
    }
}
