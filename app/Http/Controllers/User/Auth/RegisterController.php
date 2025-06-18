<?php

namespace App\Http\Controllers\User\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller{
    public function index(){
        return view('user.auth.register');
    }

    public function register(Request $request){
        $user = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:15|unique:users,phone',
        ]);

        $user['password'] = Hash::make($user['password']);
        $user  = User::create($user);
        Auth::login($user);
        // dd($user);
        return redirect()->route('user.home')->with('success', 'Registration successful');
    }
}