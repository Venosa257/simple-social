<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $credentials = $validator->getData();
        unset($credentials['_token']);
        
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }

      
        return redirect('/login')->with('loginError', 'Login Failed!');
        
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}