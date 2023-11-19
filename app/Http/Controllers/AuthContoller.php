<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthContoller extends Controller
{
    function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->password == $request->password) {
                session()->put([
                    'role' => $user->role,
                    'user_id' => $user->id
                ]);
                return redirect()->intended('pesanan'); 
            }
        }
        return back()->with('error','Password atau email kamu salah');
    }

    function logout(){
        session()->invalidate();
        return redirect()->intended();
    }
    
    function register(){
        return view('register');
    }
}
