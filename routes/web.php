<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DepartmentController;
use App\Models\Department;

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
Route::get('/', [AuthController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/signin', [AuthController::class, 'signin'])->name('login');
Route::post('/signin', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// controll user management - Admin only
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('user/show', [UserController::class, 'show'])->name('user.show');
    Route::delete('user/destroy', [UserController::class, 'delete'])->name('user.delete');
    Route::put('user/update/{id}', [UserController::class, 'update_user'])->name('user.update');
    Route::post('user/filter', [UserController::class, 'filter'])->name('user.filter');
    Route::post('user/search', [UserController::class, 'searchUser'])->name('user.search');
});

// Student list - Accessible by Admin and Teacher
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::get('student-list', [UserController::class, 'studentList'])->name('student.index');
    Route::get('student/filter', [UserController::class, 'filterStudent'])->name('student.filter');
    Route::get('student/search', [UserController::class, 'searchStudent'])->name('student.search');
});

// control class management - Admin and Teacher
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::resource('class', ClassesController::class);
    Route::post('class/store', [ClassesController::class, 'store'])->name('class.store');
    Route::post('class/filter', [ClassesController::class, 'filter'])->name('class.filter');
    Route::post('class/search', [ClassesController::class, 'search'])->name('class.search');
    Route::put('class/update', [ClassesController::class, 'update'])->name('class.update');
    Route::get('/class/get-students/{id}', [ClassesController::class, 'getStudentsForClass']);
    Route::post('class/add-student-to-class', [ClassesController::class, 'addStudentToClass'])->name('class.add-student-to-class');
    Route::get('class/show-students/{id}', [ClassesController::class, 'showStudents'])->name('class.show-students');
    Route::post('class/remove-student', [ClassesController::class, 'removeStudent'])->name('class.remove-student');
    Route::post('class/change-student-class', [ClassesController::class, 'changeStudentClass'])->name('class.change-student-class');
});

// department - Admin and Teacher
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::get('department', [DepartmentController::class, 'index'])->name('department.index');
    Route::post('department/store', [DepartmentController::class,'store'])->name('department.store');
    Route::delete('department/destroy', [DepartmentController::class, 'destroy'])->name('department.destroy');
    Route::put('department/update', [DepartmentController::class, 'update'])->name('department.update');
    Route::post('department/search', [DepartmentController::class, 'search'])->name('department.search');
});

// course management - Admin and Teacher
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::resource('course', CourseController::class);
    Route::post('course/store', [CourseController::class, 'store'])->name('course.store');
    Route::post('course/search', [CourseController::class, 'search'])->name('course.search');
    Route::delete('course/destroy', [CourseController::class, 'destroy'])->name('course.destroy');
    Route::put('course/update', [CourseController::class, 'update'])->name('course.update');
});