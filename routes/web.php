<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TeacherPanel\RegisteredController;
use App\Http\Controllers\TeacherPanel\ClassesController;
use App\Http\Controllers\TeacherPanel\SubjectController;
use App\Http\Controllers\TeacherPanel\ChapterController;
use App\Http\Controllers\TeacherPanel\TopicController;


Route::get('', function () {
    return view('login');
});


Auth::routes(); //*Auth::routes() is a helper class that helps you generate all the routes required for user authentication.

Route::group (['middleware' => ['auth','isAdmin']], function (){  //*For Admin
    Route::get('adminpanel', function () {
        return view('Dashboards.AdminPanel');
    });
    Route::get('/registered-user','App\Http\Controllers\AdminPanel\RegisteredController@index');
    Route::get('role-edit/{id}','App\Http\Controllers\AdminPanel\RegisteredController@edit');
    Route::put('role-update/{id}','App\Http\Controllers\AdminPanel\RegisteredController@updaterole');
    Route::get('user-delete/{id}','App\Http\Controllers\AdminPanel\RegisteredController@delete');
    Route::get('user-deleted-records','App\Http\Controllers\AdminPanel\RegisteredController@deletedrecords');
    Route::get('user-re-store/{id}','App\Http\Controllers\AdminPanel\RegisteredController@deletedrestore');
    Route::get('user-permanentdelete/{id}','App\Http\Controllers\AdminPanel\RegisteredController@permanentdelete');
});

Route::group (['middleware' => ['auth','isStudent']], function (){  //*For Student
        Route::get('studentpanel', function () {
            return view('Dashboards.StudentPanel'); });
        });

Route::group (['middleware' => ['auth','isTeacher']], function (){  //*For Teacher
    Route::get('teacherpanel', function () {
        return view('Dashboards.TeacherPanel');  });

//* Classes Routes
    Route::get('classes','App\Http\Controllers\TeacherPanel\ClassesController@index');
    Route::get('classes-add','App\Http\Controllers\TeacherPanel\ClassesController@viewpage');
    Route::post('classes-store','App\Http\Controllers\TeacherPanel\ClassesController@store');
    Route::get('classes-edit/{id}','App\Http\Controllers\TeacherPanel\ClassesController@edit');
    Route::put('classes-update/{id}','App\Http\Controllers\TeacherPanel\ClassesController@update');
    Route::get('classes-delete/{id}','App\Http\Controllers\TeacherPanel\ClassesController@delete');
    Route::get('classes-deleted-records','App\Http\Controllers\TeacherPanel\ClassesController@deletedrecords');
    Route::get('classes-re-store/{id}','App\Http\Controllers\TeacherPanel\ClassesController@deletedrestore');
    Route::get('classes-permanentdelete/{id}','App\Http\Controllers\TeacherPanel\ClassesController@permanentdelete');

 //* Subject Routes
    Route::get('subject','App\Http\Controllers\TeacherPanel\SubjectController@index');
    Route::get('subject-add','App\Http\Controllers\TeacherPanel\SubjectController@viewpage');
    Route::post('/subject-store','App\Http\Controllers\TeacherPanel\SubjectController@store');
    Route::get('subject-edit/{id}','App\Http\Controllers\TeacherPanel\SubjectController@edit');
    Route::put('subject-update/{id}','App\Http\Controllers\TeacherPanel\SubjectController@update');
    Route::get('subject-delete/{id}','App\Http\Controllers\TeacherPanel\SubjectController@delete');
    Route::get('subject-deleted-records','App\Http\Controllers\TeacherPanel\SubjectController@deletedrecords');
    Route::get('subject-re-store/{id}','App\Http\Controllers\TeacherPanel\SubjectController@deletedrestore');
    Route::get('subject-permanentdelete/{id}','App\Http\Controllers\TeacherPanel\SubjectController@permanentdelete');


    //* Chapters Routes
    Route::get('chapter','App\Http\Controllers\TeacherPanel\ChapterController@index');
    Route::get('chapter-add','App\Http\Controllers\TeacherPanel\ChapterController@viewpage');
    Route::post('/chapter-store','App\Http\Controllers\TeacherPanel\ChapterController@store');
    Route::get('chapter-edit/{id}','App\Http\Controllers\TeacherPanel\ChapterController@edit');
    Route::put('chapter-update/{id}','App\Http\Controllers\TeacherPanel\ChapterController@update');
    Route::get('chapter-delete/{id}','App\Http\Controllers\TeacherPanel\ChapterController@delete');
    Route::get('chapter-deleted-records','App\Http\Controllers\TeacherPanel\ChapterController@deletedrecords');
    Route::get('chapter-re-store/{id}','App\Http\Controllers\TeacherPanel\ChapterController@deletedrestore');
    Route::get('chapter-permanentdelete/{id}','App\Http\Controllers\TeacherPanel\ChapterController@permanentdelete');

    //*Topics Routes
    Route::get('topic','App\Http\Controllers\TeacherPanel\TopicController@index');
    Route::get('topic-add','App\Http\Controllers\TeacherPanel\TopicController@viewpage');
    Route::post('/topics-store','App\Http\Controllers\TeacherPanel\TopicController@store');
    Route::get('topic-edit/{id}','App\Http\Controllers\TeacherPanel\TopicController@edit');
    Route::put('topic-update/{id}','App\Http\Controllers\TeacherPanel\TopicController@update');
    Route::get('topic-delete/{id}','App\Http\Controllers\TeacherPanel\TopicController@delete');
    Route::get('topic-deleted-records','App\Http\Controllers\TeacherPanel\TopicController@deletedrecords');
    Route::get('topic-re-store/{id}','App\Http\Controllers\TeacherPanel\TopicController@deletedrestore');
    Route::get('topic-permanentdelete/{id}','App\Http\Controllers\TeacherPanel\TopicController@permanentdelete');

});

Route::get('noaccess', [App\Http\Controllers\HomeController::class, 'index']);


