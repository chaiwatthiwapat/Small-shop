<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\AdminMiddleware;


// Session::forget('usercode');
if(!session()->has('usercode')) {
    session(['usercode' => uniqid().time()]);
}

Route::get('/', fn () => view('pages.index'))->name('index');

Route::prefix('product')->group(function() {
    Route::get('/', fn () => view('pages.product.index'))->name('product.index');
    Route::get('/detail/{id}', fn ($id) => view('pages.product.detail', compact('id')))->name('product.detail');
});

Route::prefix('shopping-cart')->group(function() {
    Route::get('/', fn () => view('pages.shopping-cart.index'))->name('shopping-cart');
});


Route::prefix('history')->group(function() {
    Route::get('/', fn () => view('pages.history.index'))->name('history');
});


Route::middleware(['auth', AdminMiddleware::class])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', fn () => view('pages.admin.index'))->name('admin.index');
        Route::get('/category', fn () => view('pages.admin.category.index'))->name('admin.category.index');
        Route::get('/delivery-service', fn () => view('pages.admin.delivery-service.index'))->name('admin.delivery-service.index');
        Route::get('/contact', fn () => view('pages.admin.contact.index'))->name('admin.contact.index');
        Route::get('/other', fn () => view('pages.admin.other.index'))->name('admin.other.index');

        Route::prefix('product')->group(function() {
            Route::get('/', fn () => view('pages.admin.product.index'))->name('admin.product.index');
            Route::get('/detail/{id}', fn ($id) => view('pages.admin.product.detail', compact('id')))->name('admin.product.detail');
        });
    });
});

Route::prefix('auth')->group(function() {
    Route::get('/login', fn () => view('pages.auth.login'))->name('login');
    Route::get('/register', fn () => view('pages.auth.register'))->name('register');
    Route::get('/forget-password', fn () => view('pages.auth.forget-password'))->name('forget-password');
});

Route::get('/logout', [Login::class, 'logout'])->name('logout');


