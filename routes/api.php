<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TeachrController;
use App\Http\Controllers\StudentController;
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

 //* User Controller Route

Route::post('login', 'App\Http\Controllers\UsersController@login');
Route::post('register', 'App\Http\Controllers\UsersController@register');

Route::group(['middleware' => 'auth:api'], function()
{
Route::post('logout', 'App\Http\Controllers\UsersController@logout');
Route::post('changepassword','App\Http\Controllers\UsersController@changepassword');
});

//* Teacher Controller Route

Route::group(['middleware' => 'auth:api'], function()
{
    Route::get('getprofile','App\Http\Controllers\TeachrController@getprofile');
    Route::post('profileupdate','App\Http\Controllers\TeachrController@profileupdate');
    Route::post('contentupload','App\Http\Controllers\TeachrController@contentupload');
});

//* Student Controller Route

Route::group(['middleware' => 'auth:api'], function()
{
    Route::post('studentprofileupdate','App\Http\Controllers\StudentController@studentprofileupdate');
    Route::get('subject','App\Http\Controllers\StudentController@subject');
    Route::post('chapter','App\Http\Controllers\StudentController@chapter');
    Route::post('topic','App\Http\Controllers\StudentController@topic');
    Route::post('contentview','App\Http\Controllers\StudentController@contentview');
});













