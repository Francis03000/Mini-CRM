<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\Company;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function register(Request $request){
    //     $fields = $request->validate([
    //         'name' => ['required', 'max:255'],
    //         'email' => ['required', 'max:255', 'email', 'unique:users'],
    //         'password' => ['required', 'min:3', 'confirmed'],
    //     ]);

    //     //REGISTER
    //     $user = User::create($fields);

    //     Auth::login($user);

    //     $companies = Company::get();
    //     return view('company', ['companies' => $companies]);

    // }

    public function login(Request $request){       
        $fields = $request->validate([
            
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);

    

       if(Auth::attempt($fields, $request->remember)){
            $user = Auth::user();
            return redirect()->intended('company')->with('success', 'Welcome back '. $user->name);;; 

       } else{
            return back()->withErrors([
                'failed' => 'The email or password is incorrect'
            ]);
       }
    }

    public function logout(Request $request){

        Auth::logout();

        request()->session()->invalidate(); 

        request()->session()->regenerateToken();

        return redirect()->route('login');   

    }
}
