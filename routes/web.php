<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\http\Controllers\CourseController;

//Route::get('/students', 'StudentController@index');

//Route::get('/', function () {
//    return view('index');
//});


Route::get('/', fn () => view('dashboard'));
Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');



Route::resource('students', StudentController::class);
Route::get('/students/{id}/delete', [StudentController::class, 'delete'])->name('students.delete');

Route::resource('/courses', CourseController::class);
Route::get('/courses/{id}/view', [CourseController::class, 'view'])->name('courses.view');

