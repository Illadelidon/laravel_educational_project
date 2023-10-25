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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'Post'],function (){
    Route::get('/post',[IndexController::class,'__invoke'])->name('post.index');
    Route::get('/post/create',[CreateController::class,'__invoke'])->name('post.create');
    Route::post('/post',[StoreController::class,'__invoke'])->name('post.store');
    Route::get('/post/{post}',[ShowController::class,'__invoke'])->name('post.show');
    Route::get('/post/{post}/edit',[EditController::class,'__invoke'])->name('post.edit');
    Route::patch('/post/{post}',[UpdateController::class,'__invoke'])->name('post.update');
    Route::delete('/post/{post}',[DeleteController::class,'__invoke'])->name('post.delete');
});


//Route::get('/post/update',[PostController::class,'update']);
//Route::get('/post/delete',[PostController::class,'delete']);
//Route::get('/post/first_or_create',[PostController::class,'firstOrCreate']);


//Route::get('/post', function () {
//    return view('index',['posts'=>'$posts']);
//})->name('post.index');

Route::get('/main', function () {
    return view('main',['name'=>'Ilya']);
})->name('main.index');

