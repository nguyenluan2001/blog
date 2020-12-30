<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\PostController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->middleware(['auth','AllowCors'])->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/',[AdminCategoryController::class,'index'])->name('index');
        Route::post('store',[AdminCategoryController::class,'store'])->name('store');
    });
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('index');
        Route::get('add',[AdminPostController::class,'add'])->name('add');
        Route::post('store',[AdminPostController::class,'store'])->name('store');
        Route::get('edit/{post_slug}',[AdminPostController::class,'edit'])->name('edit');
        Route::post('update/{post_slug}',[AdminPostController::class,'update'])->name('update');
        Route::get('post_by_category/{post_cat_slug}/{post_sub_cat_slug?}',[AdminPostController::class,'post_by_category'])->name('post_by_category');
        Route::get('delete/{post}',[AdminPostController::class,'delete'])->name('delete');
    });
    
    Route::prefix('ajax')->name('ajax.')->group(function(){
        Route::post('post_sub_cat',[AjaxController::class,'post_sub_cat_ajax']);
    });
});
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/{post_slug}',[PostController::class,'show'])->name('post.show');
Route::get('category/{post_cat_slug}/{post_sub_cat_slug?}',[PostController::class,'post_by_category'])->name('post_by_category');
Route::post('search',[PostController::class,'search'])->name('search');