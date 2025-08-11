<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\http\Controllers\CourseController;
use App\Http\Controllers\AuthController;

//Route::get('/students', 'StudentController@index');

//Route::get('/', function () {
//    return view('index');
//});


Route::get('/', fn () => view('admin_views.dashboard'));
Route::get('/dashboard', fn () => view('admin_views.dashboard'))->name('dashboard');



Route::resource('students', StudentController::class);
Route::get('/students/{id}/delete', [StudentController::class, 'delete'])->name('students.delete');
Route::resource('/courses', CourseController::class);
Route::get('/courses/{id}/view', [CourseController::class, 'view'])->name('courses.view');


//auth

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);