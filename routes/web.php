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

# Роут в контролллер (страница приветствия)
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

# Роут в контролллер (страница выбора категорий новостей)
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('categories');

# Роут в контролллер (страница добавления новостей) (Метод GET)
Route::get('/news/add', [\App\Http\Controllers\NewsController::class, 'add'])->name('add_news')->middleware('auth');

# Роут в контролллер (роут для выбора локализации) (Метод POST)
Route::post('/news/locale', [\App\Http\Controllers\NewsController::class, 'add'])->name('locale');

# Роут в контролллер (роут для выбора локализации) (Метод GET)
Route::get('/news/locale', [\App\Http\Controllers\NewsController::class, 'add'])->name('locale');

# Роут в контролллер (страница добавления новостей) (метод POST) ОБНОВЛЯЕМ НОВОСТЬ
Route::post('/news/add', [\App\Http\Controllers\NewsController::class, 'update_post'])->name('update_news_post');

# Роут в контролллер (страница добавления новостей) (метод POST) ДОБАВЛЯЕМ НОВОСТЬ
Route::post('/news/add/news', [\App\Http\Controllers\NewsController::class, 'add_post'])->name('add_news_post');

# Роут в контролллер (страница добавления новостей) (метод POST) УДАЛЯЕМ НОВОСТЬ
Route::post('/news/add/delete', [\App\Http\Controllers\NewsController::class, 'delete'])->name('delete_news_post');

# Роут в контролллер (страница выбранной категории новостей)
Route::get('/news/categories/{id}', [\App\Http\Controllers\NewsController::class, 'categories'])->name('news');

# Роут в контролллер (страница выбранной новости)
Route::get('/news/categories/one_news/{id}', [\App\Http\Controllers\NewsController::class, 'one_news'])->name('one_news');

# Роут в контролллер (страница авторизации)
Route::get('/auth', [\App\Http\Controllers\System\SystemController::class, 'auth'])->name('auth');


# Роут в контролллер (страница добавления категорий) (Метод GET)
Route::get('/category/add', [\App\Http\Controllers\CategoryController::class, 'add'])->name('add_category');

# Роут в контролллер (страница добавления категорий) (метод POST) ОБНОВЛЯЕМ НОВОСТЬ
Route::post('/category/add', [\App\Http\Controllers\CategoryController::class, 'update_post'])->name('update_category_post');

# Роут в контролллер (страница добавления категории) (метод POST) ДОБАВЛЯЕМ КАТЕГОРИЮ
Route::post('/category/add/category', [\App\Http\Controllers\CategoryController::class, 'add_post'])->name('add_category_post');

# Роут в контролллер (страница добавления категорий) (метод POST) УДАЛЯЕМ КАТЕГОРИЮ
Route::post('/category/add/delete', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('delete_category_post');

/*
#Add route
Route::get('/about', function () {
    return view('about');
});

#Add route
Route::get('/contact', function () {
    return view('contact');
});
 
 */

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/news/profile', [\App\Http\Controllers\System\ProfileController::class, 'update'])->name('update')->middleware('auth');
