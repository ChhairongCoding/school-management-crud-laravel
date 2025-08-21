<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\controllers\LessonController;

// --- PUBLIC ROUTES ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/courses', [PageController::class, 'courses'])->name('courses.index');
Route::get('/courses/{course}', [PageController::class, 'show'])->name('courses.show'); // Changed {id} to {course} for route model binding
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// --- AUTHENTICATED USER ROUTES ---
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/courses/{course}/enroll', [App\Http\Controllers\EnrollmentController::class, 'store'])->name('courses.enroll');

});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('courses', CourseController::class)->names('admin.courses');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('students', StudentController::class)->names('admin.students');


    Route::get('/courses/{course}/lessons/create', [LessonController::class, 'create'])->name('admin.lessons.create');
    Route::get('/courses/{course}/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('admin.lessons.edit');
    Route::put('/courses/{course}/lessons/{lesson}', [LessonController::class, 'update'])->name('admin.lessons.update');
    Route::delete('/courses/{course}/lessons/{lesson}', [LessonController::class, 'destroy'])->name('admin.lessons.destroy');

    Route::post('/courses/{course}/lessons', [LessonController::class, 'store'])->name('admin.lessons.store');
    Route::get('/lessons/{lesson}', [PageController::class, 'showLesson'])->name('lessons.show')->middleware('auth');

});
