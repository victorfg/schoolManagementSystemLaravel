<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('teacher', [TeacherController::class, 'index']);
    Route::get('student', [StudentController::class, 'index']);
    Route::get('test', [TestController::class, 'index']);
    Route::get('profile/modify', [UserProfileController::class, 'index'])->name('profile/modify');
    Route::post('profile/modify', [UserProfileController::class, 'update'])->name('profile/modify');
});

Route::resource('course', CourseController::class);
Route::resource('subject', SubjectController::class);
