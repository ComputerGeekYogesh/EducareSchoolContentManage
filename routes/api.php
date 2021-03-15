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

 //* User Controller Route
Route::post('login', 'App\Http\Controllers\UsersController@login');
Route::post('register', 'App\Http\Controllers\UsersController@register');
Route::post('logout', 'App\Http\Controllers\UsersController@logout')->middleware('auth:api');

//* Teacher Controller Route
Route::post('getprofile','App\Http\Controllers\TeacherController@getprofile');
Route::post('profileupdate','App\Http\Controllers\TeacherController@profileupdate');
Route::post('videoupload','App\Http\Controllers\TeacherController@videoupload');

//* Student Controller Route
Route::get('class','App\Http\Controllers\StudentController@class');
Route::get('subject','App\Http\Controllers\StudentController@subject');
Route::get('chapter','App\Http\Controllers\StudentController@chapter');
Route::get('topic','App\Http\Controllers\StudentController@topic');
Route::get('video','App\Http\Controllers\StudentController@video');











//Route::post('subassign','App\Http\Controllers\TeacherController@subassign');
