<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdukController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function(){
    return view('customer.home');
});


// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'authenticate']);

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/about', function(){
    return view('customer.about');
});

Route::get('/shop', function(){
    return view('customer.shop');
});

Route::get('/shop-single', function(){
    return view('customer.shop-single');
});

Route::get('/contact', function(){
    return view('customer.contact');
});

Route::get('/home_admin', function(){
    return view('admin.home_admin');
});

Route::resource('produk', ProdukController::class);



