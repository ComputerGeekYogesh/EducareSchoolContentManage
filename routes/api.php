<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\teacherController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', 'App\Http\Controllers\UsersController@login');
Route::post('register', 'App\Http\Controllers\UsersController@register');
Route::post('logout', 'App\Http\Controllers\UsersController@logout')->middleware('auth:api');
Route::get('profile','App\Http\Controllers\teacherController@profile');
Route::post('profileupdate','App\Http\Controllers\teacherController@profileupdate');
Route::post('videoupload','App\Http\Controllers\teacherController@videoupload');
