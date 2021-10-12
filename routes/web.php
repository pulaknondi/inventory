<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
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

Route::get('/categories',[BrandController::class,'index'])->name('category.index');
Route::get('/category-create',[BrandController::class,'create'])->name('category.create');
Route::post('/category-store',[BrandController::class,'store'])->name('category.store');
Route::get('/category-edit/{id}',[BrandController::class,'edit'])->name('category.edit');
Route::post('/category-update/{id}',[BrandController::class,'update'])->name('category.update');