<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login',[
            'title' => 'Login Page'
        ]);
    }
    public function login(Request $request) {
        $validateData = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(Auth::attempt($validateData)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'message' => 'Email atau Password Salah'
        ]);
    }
}
