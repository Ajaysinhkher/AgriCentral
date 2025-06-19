<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(CategoryRequest $request)
    {
        try{

            $category = Category::create([
                'name'=>$request->name,
                'slug' => Str::slug($request->name),
                'status'=>$request->status,
            ]);

            return redirect()->route('admin.category.index')->with('success','category added successfully !');

        }catch(Exception $e){
            return back()->with('Error','Category not created !');
        }

    }

    public function edit($id)
    {
        try{

            $category = Category::findOrFail($id);
            
            return view('admin.category.edit',compact('category'));

        }catch(Exception $e){
            return back()->with('error','failed to edit the category!');
        }

    }

    public function update(CategoryRequest $request, $id)
    { 
        try{

            $category = Category::findOrFail($id);
            $category->update([
                'name'=>$request->name,
                'status'=>$request->status,
            ]);

            return redirect()->route('admin.category.index')->with('category updated successfully !');

        }catch(Execption $e){
            return back()->with('error','failed to update the category !');
        }

    }

    public function delete($id)
    {
        try{
            
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('admin.category.index')->with('success','Category Deleted Successfuly !');


        }catch(Exception $e){
            return back()->with('error','category not deleted !');
        }
    }
}
