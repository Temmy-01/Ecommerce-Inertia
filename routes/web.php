<?php

use Illuminate\Foundation\Application;
use Inertia\Inertia;

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/dashboard', [DashboardController::class, 'dashboard']);

//for slider
Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
Route::get('/slider/create', [SliderController::class, 'create']);
Route::post('/slider/store', [SliderController::class, 'store']);
Route::get('/slider/{id}/edit', [SliderController::class, 'edit']);
Route::post('/slider/{id}/update', [SliderController::class, 'update']);
Route::post('/slider/{id}/delete', [SliderController::class, 'destroy']);

//for brand
Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class, 'create']);
Route::post('/brand/store', [BrandController::class, 'store']);
Route::get('/brand/{id}/edit', [BrandController::class, 'edit']);
Route::post('/brand/{id}/update', [BrandController::class, 'update']);
Route::post('/brand/{id}/delete', [BrandController::class, 'destroy']);

//for category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::post('/category/{id}/update', [CategoryController::class, 'update']);
Route::post('/category/{id}/delete', [CategoryController::class, 'destroy']);

//for Product
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::post('/product/{id}/update', [ProductController::class, 'update']);
Route::post('/product/{id}/delete', [ProductController::class, 'destroy']);