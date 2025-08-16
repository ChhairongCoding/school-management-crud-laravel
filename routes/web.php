<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;


Route::middleware(['auth', 'admin'])->group(function () {
//    Route::get('/dashboard', fn () => view('admin_views.dashboard'))->name('dashboard');

    Route::resource('students', StudentController::class);
    Route::get('/students/{id}/delete', [StudentController::class, 'delete'])->name('students.delete');

    // Assuming course creation/management is for admins
    Route::resource('/admin/courses', CourseController::class)->names('admin.courses');
    // Inside your admin middleware group, find the dashboard route
// and change it to this:
    Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', App\Http\Controllers\UserController::class);

});


Route::middleware('auth')->group(function () {
    // Add the logout route here
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Public-facing pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/courses', [PageController::class, 'courses'])->name('courses.index');
Route::get('/courses/{id}', [PageController::class, 'show'])->name('courses.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
