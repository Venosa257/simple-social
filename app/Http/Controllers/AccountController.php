<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.account.index',[
            'user' => User::find(auth()->user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
       
        return view('dashboard.account.edit',[
            'user' => $user::find(auth()->user()->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'username' => 'required',
            'email' => 'required|email',
            'image' => 'image|file|max:3072',
        
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('/dashboard/account/edit')->withErrors($validator)->withInput();
        }

        $validatedData = $validator->getData();
        
        if($request->file('image')) {
            if($request->oldImage) {
                
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile-picture');
        }
        
        unset($validatedData['_token']);
        unset($validatedData['_method']);
        unset($validatedData['oldImage']);
        
        User::where('id',auth()->user()->id)
        ->update($validatedData);

        
        return redirect('/dashboard/account')->with('success', 'Account has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       
            if($user->image) {
                    
                Storage::delete($user->image);
            }
            User::destroy($user->id);
            return redirect('/dashboard/login')->with('success', 'Account has been deleted!');
  
    }
}