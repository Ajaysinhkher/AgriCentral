<?php

namespace App\Http\Controllers\User\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller{

    public function index(){
        return view('user.auth.login');
    }

    public function login(Request $request){
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',    
        ]);

        if(Auth::attempt($user)){
            $request->session()->regenerate();
            return redirect()->route('user.home')->with('success', 'Login successful');
        }
        else{
            return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
        
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login')->with('success', 'Logout successful');
    }
}