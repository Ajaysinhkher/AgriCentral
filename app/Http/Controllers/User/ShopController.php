<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function index()
    {
        return view('user.shop');
    }
}