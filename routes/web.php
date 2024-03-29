<?php

use App\Livewire\AddParent;
use Livewire\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| AMS Routes
|--------------------------------------------------------------------------
|
*/

Auth::routes();
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

        //Home Route
        Route::get('/', function () {return view('index'); })->name('home');
        //Grades Route
        Route::resource('grades', 'App\Http\Controllers\GradeController');
        //Classrooms Route
        Route::resource('classrooms', 'App\Http\Controllers\ClassroomController');
        //Sections Route
        Route::resource('sections', 'App\Http\Controllers\SectionController');
        //Parents Route --- ( Livewire ) ---
        Route::view('parents', 'pages.parents.add')->name('parents.add');
        //Teachers Route
        Route::resource('teachers', 'App\Http\Controllers\TeacherController');
        //Students Route
        Route::resource('students', 'App\Http\Controllers\StudentController');

});