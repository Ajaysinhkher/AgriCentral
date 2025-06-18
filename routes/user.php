<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\MarketPriceController;

Route::get('/',[LoginController::class,'index'])->middleware('guest')->name('user.login');
Route::post('/login',[LoginController::class,'login'])->middleware('guest')->name('user.login.post');

Route::get('/register',[RegisterController::class,'index'])->middleware('guest')->name('user.register');
Route::post('/register',[RegisterController::class,'register'])->middleware('guest')->name('user.register.post');

Route::post('/logout',[LoginController::class,'logout'])->middleware('auth')->name('user.logout');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/blog',[HomeController::class,'blog'])->middleware('auth')->name('blog');




Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('user.home');

Route::get('/shop',[ShopController::class,'index'])->middleware('auth')->name('user.shop');
Route::get('/marketprice',[MarketPriceController::class,'index'])->middleware('auth')->name('user.marketprice');