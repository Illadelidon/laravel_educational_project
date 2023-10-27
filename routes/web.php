<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use \App\Http\Controllers\Post\IndexController;
use \App\Http\Controllers\Post\CreateController;
use \App\Http\Controllers\Post\StoreController;
use \App\Http\Controllers\Post\ShowController;
use \App\Http\Controllers\Post\EditController;
use \App\Http\Controllers\Post\UpdateController;
use \App\Http\Controllers\Post\DeleteController;
use \App\Http\Controllers\Admin\Post\IndexPostController;
use \App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/home', [HomeController::class,'index']);



Route::group(['namespace'=>'Post'],function (){
    Route::get('/post',[IndexController::class,'__invoke'])->name('post.index');
    Route::get('/post/create',[CreateController::class,'__invoke'])->name('post.create');
    Route::post('/post',[StoreController::class,'__invoke'])->name('post.store');
    Route::get('/post/{post}',[ShowController::class,'__invoke'])->name('post.show');
    Route::get('/post/{post}/edit',[EditController::class,'__invoke'])->name('post.edit');
    Route::patch('/post/{post}',[UpdateController::class,'__invoke'])->name('post.update');
    Route::delete('/post/{post}',[DeleteController::class,'__invoke'])->name('post.delete');


});
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'admin'],function (){
    Route::group(['namespace'=>'Post'],function (){
        Route::get('/post',[IndexPostController::class,'__invoke'])->name('admin.post.index');
    });

});





Route::get('/main', function () {
    return view('main',['name'=>'Ilya']);
})->name('main.index');




Auth::routes();


