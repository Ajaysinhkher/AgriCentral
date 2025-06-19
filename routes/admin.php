<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;

Route::get('/admin', [LoginController::class, 'index'])->middleware('guest:admin')->name('admin.login');
Route::prefix('admin')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.post');

    Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth:admin')->name('admin.dashboard'); 
    Route::post('/logout',[LoginController::class,'logout'])->middleware('auth:admin')->name('admin.logout');

    Route::prefix('products')->middleware('auth:admin')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('admin.product.index');
        Route::get('/create',[ProductController::class,'create'])->name('admin.product.create');
        Route::post('/store',[ProductController::class,'store'])->name('admin.product.store');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
        Route::put('/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
        Route::delete('/{id}',[ProductController::class,'delete'])->name('admin.product.delete');
    });

    Route::prefix('categories')->middleware('auth:admin')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::put('/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::delete('/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
     
    });

    Route::prefix('customers')->middleware('auth:admin')->group(function(){
        Route::get('/',[CustomerController::class,'index'])->name('admin.customer.index');
        // Route::get('/create',[CustomerController::class,'create'])->name('admin.customer.create');
        // Route::post('/store',[CustomerController::class,'store'])->name('admin.customer.store');
        Route::get('/edit/{id}',[CustomerController::class,'edit'])->name('admin.customer.edit');
        Route::put('/update/{id}',[CustomerController::class,'update'])->name('admin.customer.update');
        Route::delete('/{id}',[CustomerController::class,'delete'])->name('admin.customer.delete');
     
    });
});


