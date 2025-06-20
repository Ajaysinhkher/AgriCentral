<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        // dd($products);
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    public function store(ProductRequest $request)
    {
       try{
            // dd($request);
            $imagePath = null;
            if($request->hasFile('image')) 
            {
                $imagePath = $request->file('image')->store('products','public');
            }
            $product = Product::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'stock' => $request->stock,
                    'status' => $request->status,
                    'slug' => Str::slug($request->name),
                    'image' => $imagePath,
                ]);

            $product->categories()->attach($request->categories);

            return redirect()->route('admin.product.index')->with('success','product added successfully !');

       }catch(Exception $e){

            return back()->with('eror','failed to add product');
       }

    }

    public function edit($id)
    {
        try{

            $product = Product::findOrFail($id);
            $categories = Category::all();
            $selectedCategories = $product->categories->pluck('id')->toArray();

            return view('admin.product.edit',compact('product','categories','selectedCategories'));

        }catch(Exception $e){
            return back()->with('error','failed to edit the product');
        }
    }
    
    public function update(ProductRequest $request, $id)
    {
        try {
            
            $product = Product::findOrFail($id);

            // Handle image upload
            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);

                    // dd('image deleted');
                }

                $imagePath = $request->file('image')->store('products','public');
                $product->image = $imagePath;
            }

            // Update Product
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'stock' => $request->stock,
                'status' => $request->status,
                'slug' => Str::slug($request->name),
                'image' => $product->image,
            ]);

            // Sync categories -->sync() will remove the older relationships and provide stores new relationships
            $product->categories()->sync($request->categories);

            return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            // Log::error('AdminProductController@update Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to update product.');
        }
    }

    public function delete($id)
    {
        try{
            $product = Product::findOrFail($id);
            $product->delete();   //it is getting sooftdeleted as  we had used it , to permanantly delete use the function "forceDelete()"
            return redirect()->route('admin.product.index')->with('success','product deleted successfully !');

        }catch(Exception $e){
            return back()->with('error','product not deleted !');
        }

    }

}
