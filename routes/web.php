<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post',[PostController::class,'store'])->name('post.store');
Route::get('/post/{post}',[PostController::class,'show'])->name('post.show');
Route::get('/post/{post}/edit',[PostController::class,'edit'])->name('post.edit');
Route::patch('/post/{post}',[PostController::class,'update'])->name('post.update');
Route::delete('/post/{post}',[PostController::class,'destroy'])->name('post.delete');
//Route::get('/post/update',[PostController::class,'update']);
//Route::get('/post/delete',[PostController::class,'delete']);
//Route::get('/post/first_or_create',[PostController::class,'firstOrCreate']);


//Route::get('/post', function () {
//    return view('index',['posts'=>'$posts']);
//})->name('post.index');

Route::get('/main', function () {
    return view('main',['name'=>'Ilya']);
})->name('main.index');

