<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!###
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
 
 */

# Роут в контролллер
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');;

Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('categories');;

Route::get('/news/add', [\App\Http\Controllers\NewsController::class, 'add'])->name('add_news');;

Route::get('/news/categories/{id}', [\App\Http\Controllers\NewsController::class, 'categories'])->name('news');;

#Add route
Route::get('/about', function () {
    return view('about');
});

#Add route
Route::get('/contact', function () {
    return view('contact');
});
