<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SuppliersController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.home');
})->name('dashboard');
Route::get('/brands',[BrandController::class,'index'])->name('brand.index');
Route::get('/brand-create',[BrandController::class,'create'])->name('brand.create');
Route::post('/brand-store',[BrandController::class,'store'])->name('brand.store');
Route::get('/brand-edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
Route::post('/brand-update/{id}',[BrandController::class,'update'])->name('brand.update');

Route::get('/categories',[CategoriesController::class,'index'])->name('category.index');
Route::get('/category-create',[CategoriesController::class,'create'])->name('category.create');
Route::post('/category-store',[CategoriesController::class,'store'])->name('category.store');
Route::get('/category-edit/{id}',[CategoriesController::class,'edit'])->name('category.edit');
Route::post('/category-update/{id}',[CategoriesController::class,'update'])->name('category.update');

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product-create',[ProductController::class,'create'])->name('product.create');
Route::post('/product-store',[ProductController::class,'store'])->name('product.store');
Route::get('/product-edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product-update/{id}',[ProductController::class,'update'])->name('product.update');

Route::get('/unit',[UnitController::class,'index'])->name('unit.index');
Route::get('/unit-create',[UnitController::class,'create'])->name('unit.create');
Route::post('/unit-store',[UnitController::class,'store'])->name('unit.store');
Route::get('/unit-edit/{id}',[UnitController::class,'edit'])->name('unit.edit');
Route::post('/unit-update/{id}',[UnitController::class,'update'])->name('unit.update');

Route::get('/supplier',[SuppliersController::class,'index'])->name('supplier.index');
Route::get('/supplier-create',[SuppliersController::class,'create'])->name('supplier.create');
Route::post('/supplier-store',[SuppliersController::class,'store'])->name('supplier.store');
Route::get('/supplier-edit/{id}',[SuppliersController::class,'edit'])->name('supplier.edit');
Route::post('/supplier-update/{id}',[SuppliersController::class,'update'])->name('supplier.update');