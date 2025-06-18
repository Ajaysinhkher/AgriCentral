<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarketPrice;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;


class MarketPriceController extends Controller
{
    public function index()
    {
        return view('user.marketprice');
    }

}