<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        // dd($request);
        $admin = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        // dd($request);
        if(Auth::guard('admin')->attempt($admin))
        {
            // dd($admin);
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Login successful');
        }
        else{
            return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
    }

    public function logout(Request $request)
    {
        try{

            Auth::guard('admin')->logout();
            $request->session()->forget('admin_auth');
            $request->session()->regenerateToken();
    
            return redirect()->route('admin.login');
        }catch(Exception $e){
            Log::error('logout error:',$e->getMessage());
            return redirect()->route('admin.login')->with('error','failed to logout');
        }

    }
}