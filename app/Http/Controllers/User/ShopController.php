<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;


class ShopController extends Controller
{
    public function index()
    {
        try{

            $products = Product::paginate(10);
            $categories = Category::all();
            // dd($products);
            return view('user.shop',compact('products','categories'));

        }catch(Exception $e){
            return back()->with('error','product not found!');
        }

    }

    public function filter(Request $request)
    {
        $slugs = $request->get('categories', []);

        $products = Product::whereHas('categories', function ($query) use ($slugs) {
            $query->whereIn('slug', $slugs);
        })->paginate(10);

        return response()->json([
            'products' => view('user.partials.product-list', compact('products'))->render()
        ]);
    }
}