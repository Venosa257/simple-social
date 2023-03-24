<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register.index');
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            "name" => 'required|max:255',
            "username" => 'required|min:3|max:255|unique:users|alpha_dash',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator)->withInput();
        }
        
        $validatedData = $validator->getData();
        $validatedData['password'] = bcrypt($validatedData['password']) ;
        User::create($validatedData);

        
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}