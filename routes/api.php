<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TeachrController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResetPasswordAPIController;


 //* User Controller Route

Route::post('login', 'App\Http\Controllers\UsersController@login');
Route::post('register', 'App\Http\Controllers\UsersController@register');

Route::group(['middleware' => 'auth:api'], function()
{
Route::post('logout', 'App\Http\Controllers\UsersController@logout');
Route::post('changepassword','App\Http\Controllers\UsersController@changepassword');
});

Route::post('forgot','App\Http\Controllers\ResetPasswordAPIController@forgot');
Route::post('reset', 'App\Http\Controllers\ResetPasswordAPIController@reset');
Route::get('resend', 'App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');
Route::get('email/verify/{id}/{hash}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');

Route::get('verified-only', function (Request $request) {
   dd('This email is verified', $request->user()->name);
})->middleware('auth:api','verified');

Route::get('/email/verify', function (Request $request) {
    dd('This email is not verified', $request->user()->name);
})->middleware('auth:api')->name('verification.notice');



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













