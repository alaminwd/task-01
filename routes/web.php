<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('category.category');
// });

Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/delete/category/{id}', [CategoryController::class, 'delete_category'])->name('delete.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::post('/category/update', [CategoryController::class, 'category_update'])->name('category.update');
Route::get('/', [CategoryController::class, 'category'])->name('category');

