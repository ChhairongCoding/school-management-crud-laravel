<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

// --- PUBLIC ROUTES ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/courses', [PageController::class, 'courses'])->name('courses.index');
Route::get('/courses/{course}', [PageController::class, 'show'])->name('courses.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// --- GUEST-ONLY AUTH ROUTES ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// --- AUTHENTICATED USER ROUTES ---
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'store'])->name('courses.enroll');
    Route::get('/my-courses', [PageController::class, 'myCourses'])->name('my.courses');
    Route::get('/lessons/{lesson}', [PageController::class, 'showLesson'])->name('lessons.show');
});

// --- ADMIN-ONLY ROUTES ---
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('courses', CourseController::class)->names('admin.courses');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('students', StudentController::class)->names('admin.students');
    Route::resource('courses.lessons', LessonController::class)->except(['index', 'show'])->names('admin.lessons');

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/enrollments', [AdminDashboardController::class, 'enrollments'])->name('admin.enrollments.index');

});
