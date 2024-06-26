<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;


if(!session()->has('usercode')) {
    session(['usercode' => uniqid().time()]);
}

Route::get('/storage_link', function() {
    $storage_folder = storage_path('app/public');
    $link = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($storage_folder, $link);
    echo 'ok';
});


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
    Route::get('/order-detail/{order_id}', fn ($order_id) => view('pages.history.order-detail', compact('order_id')))->name('history.order-detail');
});


Route::middleware(['auth', AdminMiddleware::class])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', fn () => view('pages.admin.order.index'))->name('admin.order.index');
        Route::get('/category', fn () => view('pages.admin.category.index'))->name('admin.category.index');
        Route::get('/delivery-service', fn () => view('pages.admin.delivery-service.index'))->name('admin.delivery-service.index');
        Route::get('/contact', fn () => view('pages.admin.contact.index'))->name('admin.contact.index');
        Route::get('/other', fn () => view('pages.admin.other.index'))->name('admin.other.index');

        Route::prefix('product')->group(function() {
            Route::get('/', fn () => view('pages.admin.product.index'))->name('admin.product.index');
            Route::get('/detail/{id}', fn ($id) => view('pages.admin.product.detail', compact('id')))->name('admin.product.detail');
        });

        Route::prefix('order')->group(function() {
            Route::get('/', fn () => view('pages.admin.order.index'))->name('admin.order.index');
            Route::get('/manage-order/{order_id}', fn ($order_id) => view('pages.admin.order.manage-order', compact('order_id')))->name('admin.order.manage-order');
        });
    });
});


Route::middleware(['guest'])->group(function() {
    Route::prefix('auth')->group(function() {
        Route::get('/login', fn () => view('pages.auth.login'))->name('login');
        Route::get('/register', fn () => view('pages.auth.register'))->name('register');
        Route::get('/forget-password', fn () => view('pages.auth.forget-password'))->name('forget-password');
    });
});


Route::get('/logout', [Login::class, 'logout'])->name('logout');


