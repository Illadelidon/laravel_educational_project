<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\Post\IndexController;
use \App\Http\Controllers\Post\CreateController;
use \App\Http\Controllers\Post\StoreController;
use \App\Http\Controllers\Post\ShowController;
use \App\Http\Controllers\Post\EditController;
use \App\Http\Controllers\Post\UpdateController;
use \App\Http\Controllers\Post\DeleteController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh',[AuthController::class,'refresh']);
    Route::post('me',[AuthController::class,'me']);


});
Route::group(['namespace'=>'Post','middleware'=>'jwt.auth'],function (){
    Route::get('/post', [IndexController::class,'__invoke']);
    Route::get('/post/create', [CreateController::class,'__invoke']);
    Route::post('/post', [StoreController::class,'__invoke']);
    Route::get('/post/{post}', [ShowController::class,'__invoke']);
    Route::get('/post/{post}/edit', [EditController::class,'__invoke']);
    Route::patch('/post/{post}', [UpdateController::class,'__invoke']);
    Route::delete('/post/{post}', [DeleteController::class,'__invoke']);
});
