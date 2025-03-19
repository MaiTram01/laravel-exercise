<?php
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trangchu', [PageController::class, 'getIndex']);
Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);	
					
Route::get(uri: '/detail/{id}', action: [PageController::class, 'getDetail']);

Route::get(uri: '/contact', action: [PageController::class, 'getContact']);

Route::get(uri: '/about', action: [PageController::class, 'getAbout']);
Route::post(uri: '/search', action: [PageController::class, 'postSearch'])->name('search');

// CART
Route::get(uri: '/add-to-cart/{id}', action: [PageController::class, 'getAddToCart'])->name('themgiohang');

Route::get(uri: '/del-cart/{id}', action: [PageController::class, 'getDelItemCart'])->name('xoagiohang');

// CHECKOUT
Route::get(uri: '/check-out', action: [PageController::class, 'getCheckout'])->name('dathang');

Route::post(uri: '/check-out', action: [PageController::class, 'postCheckout'])->name('dathang');

Route::get(uri: '/admin', action: [PageController::class, 'getIndexAdmin']);

Route::get(uri: '/admin-add-form', action: [PageController::class, 'getAdminAdd'])->name('add-product');

Route::post(uri: '/admin-add-form', action: [PageController::class, 'postAdminAdd']);

Route::get(uri: '/admin-edit-form/{id}', action: [PageController::class, 'getAdminEdit']);

Route::post(uri: '/admin-edit', action: [PageController::class, 'postAdminEdit']);
//
Route::post(uri: '/admin-delete/{id}', action: [PageController::class, 'postAdminDelete']);

Route::get(uri: '/admin-export', action: [PageController::class, 'exportAdminProduct'])->name('export');

Route::get(uri: '/return-vnpay', action: function () {
    return view(view: 'vnpay.return-vnpay');
});


