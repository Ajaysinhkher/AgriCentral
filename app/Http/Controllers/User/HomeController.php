<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user  = Auth::user();
        // dd($user); // Debugging line to inspect the user object
        return view('user.home',compact('user'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function blog(){
        return view('user.blog');
    }
}