<?php
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;		
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('index', [PageController::class, 'getIndex'])->name('trang-chu');

Route::get('loai-san-pham', [PageController::class, 'getLoaiSp'])->name('loaisanpham');
		
Route::get('chi-tiet-san-pham', [PageController::class, 'getChitiet'])->name('chitietsanpham');

Route::get('lien_he', [PageController::class, 'getLienhe'])->name('lienhe');

Route::get('gioi_thieu', [PageController::class, 'getAbout'])->name('about');



