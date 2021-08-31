<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blogs', ['App\Http\Controllers\BlogController', 'index']);
//Route::get('/blogs/{bla}', ['App\Http\Controllers\BlogController', 'show']);
//Route::post('/blogs', ['App\Http\Controllers\BlogController', 'store']);
//Route::put('/blogs/{id}', ['App\Http\Controllers\BlogController', 'update']);
//Route::delete('/blogs/{id}', ['App\Http\Controllers\BlogController', 'destroy']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::resource('/blogs', 'App\Http\Controllers\BlogController')->only([
       /*  'index', */ 'store', 'update', 'destroy', 'show'
    ]);

    Route::resource('/users', 'App\Http\Controllers\UserController')->only([
        'index'
    ]);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

