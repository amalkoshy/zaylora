<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/about', fn () => view('about'))->name('about');

// ── Admin Auth ──────────────────────────────────────────────────────────────
Route::get('/admin/login', fn () => view('admin.login'))->name('admin.login')->middleware('guest');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ── Admin Panel (protected) ─────────────────────────────────────────────────
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.products'));

    Route::get('/products', fn () => view('admin.products'))->name('products');

    Route::get('/products/create', fn () => view('admin.product-form'))->name('products.create');

    Route::get('/products/{id}/edit', function ($id) {
        return view('admin.product-form', ['productId' => $id]);
    })->name('products.edit');

    Route::get('/settings', fn () => view('admin.site-settings'))->name('settings');
    Route::get('/about-settings', fn () => view('admin.about-settings'))->name('about-settings');
    Route::get('/slider-settings', fn () => view('admin.slider-settings'))->name('slider-settings');
    Route::get('/homepage-content', fn () => view('admin.homepage-content'))->name('homepage-content');
});
