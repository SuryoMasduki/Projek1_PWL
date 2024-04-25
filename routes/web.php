<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::post > digunakan untuk menangkap route atau form dengan method post
Route::get > digunakan untuk menangkap route atau form dengan method get
Route::patch > digunakan untuk menangkap route atau form dengan method patch
Route::delete > digunakan untuk menangkap route atau form dengan method delete

middleware('auth') > berfungsi untuk mengarahkan ke url /login apabila belum melakukan login

name() > digunakan untuk memberikan nama suatu route
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Untuk menjadikan semua route didalam group menerapkan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::get('/course', [CourseController::class, "addCourseView"])->name("addCourseView");
    Route::get('/course/{course}', [CourseController::class, "detailCourseView"])->name('detailCourseView');
    Route::post('/users/courses/code', [CourseController::class, 'addCourseByCode'])->name('addCourseByCode');
    Route::post('/users/courses/{course}', [CourseController::class, 'addCourse'])->name('addCourse');
    Route::delete('/users/courses/{course}', [CourseController::class, 'deleteCourse'])->name('deleteCourse');
});

require __DIR__ . '/auth.php';
