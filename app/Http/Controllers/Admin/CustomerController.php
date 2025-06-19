<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers  = User::all();
        return view('admin.customer.index',compact('customers'));
    }

    public function edit($id)
    {
        try{
            
            $customer = User::findOrFail($id);
            return view('admin.customer.edit',compact('customer'));

        }catch(Exception $e)
        {
            return back()->with('errors','failed to edit the category');
        }
    }

    public function update(CustomerRequest $request,$id)
    {
        try{
            $customer = User::findOrFail($id);
            $customer->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password' => $request->password ? bcrypt($request->password) : $customer->password,
                'status'=>$request->status,

            ]);

            return redirect()->route('admin.customer.index')->with('Custmer updated successfully !');

        }catch(Exception $e)
        {
            return back()->with('errors','Failed to update the Custmer !');
        }
    }

    public function delete($id)
    {
        try{

            $customer = User::findOrFail($id);
            $customer->delete();
    
            return redirect()->route('admin.customer.index')->with('customer deleted successfully !');
        }catch(Exception $e)
        {
            return back()->with('errors','Customer not updated !');
        }
    }
}
