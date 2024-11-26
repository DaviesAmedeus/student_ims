<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ClassSubjectController;
use App\Http\Controllers\Admin\ParentController;

Route::get('/', [AuthController::class, 'index']); //returns a form to login
Route::post('/', [AuthController::class, 'login'])->name('login'); //triggers a function to login a user
Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); //returns a form to login
Route::get('/forgot_password', [AuthController::class, 'forgotPassword'])->name('forgot_password'); //returns a form to reset a password
Route::post('/reset', [AuthController::class, 'reset'])->name('reset_password'); //accepts a post request to reset a password
Route::get('/reset/{token}', [AuthController::class, 'reseted'])->name('reseted_password');
Route::post('/reset/{token}', [AuthController::class, 'postReset']);




Route::middleware(['admin'])->group(function(){

    //returns Admin Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);

    // Admin Managing Admin
    Route::get('/admin/admin/list', [AdminController::class, 'list']);
    Route::get('/admin/admin/add', [AdminController::class, 'add']);
    Route::post('/admin/admin/add', [AdminController::class, 'insert']);
    Route::get('/admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('/admin/admin/delete/{id}', [AdminController::class, 'delete']);

    // Admin Managing Student
    Route::get('/admin/student/list', [StudentController::class, 'list']);
    Route::get('/admin/student/add', [StudentController::class, 'add']);
    Route::post('/admin/student/add', [StudentController::class, 'insert']);
    Route::get('/admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('/admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('/admin/student/delete/{id}', [StudentController::class, 'delete']);

    // Admin Managing Parent
    Route::get('/admin/parent/list', [ParentController::class, 'list']);
    Route::get('/admin/parent/add', [ParentController::class, 'add']);
    Route::post('/admin/parent/add', [ParentController::class, 'insert']);
    Route::get('/admin/parent/edit/{id}', [ParentController::class, 'edit']);
    Route::post('/admin/parent/edit/{id}', [ParentController::class, 'update']);
    Route::get('/admin/parent/delete/{id}', [ParentController::class, 'delete']);

    // Admin Managing class
    Route::get('/admin/class/list', [ClassController::class, 'list']);
    Route::get('/admin/class/add', [ClassController::class, 'add']);
    Route::post('/admin/class/add', [ClassController::class, 'insert']);
    Route::get('/admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('/admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('/admin/class/delete/{id}', [ClassController::class, 'delete']);

    // Admin Managing subject
    Route::get('/admin/subject/list', [SubjectController::class, 'list']);
    Route::get('/admin/subject/add', [SubjectController::class, 'add']);
    Route::post('/admin/subject/add', [SubjectController::class, 'insert']);
    Route::get('/admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('/admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('/admin/subject/delete/{id}', [SubjectController::class, 'delete']);

    // Admin Managing Assigned studentSubject
    Route::get('/admin/assign_subject/list', [ClassSubjectController::class, 'list']);
    Route::get('/admin/assign_subject/add', [ClassSubjectController::class, 'add']);
    Route::post('/admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
    Route::get('/admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('/admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('/admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);
    Route::post('/admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);
    Route::get('/admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);

    // Admin Managing Admin password change
    Route::get('/admin/change_password', [UserController::class, 'change_password']);
    Route::post('/admin/change_password', [UserController::class, 'update_password']);


});



Route::middleware(['teacher'])->group(function(){
    Route::get('/teacher/dashboard', [DashboardController::class, 'dashboard']); //returns a form to login

    // Managing teacher password
    Route::get('/teacher/change_password', [UserController::class, 'change_password']);
    Route::post('/teacher/change_password', [UserController::class, 'update_password']);
});

Route::middleware(['student'])->group(function(){
    Route::get('/student/dashboard', [DashboardController::class, 'dashboard']); //returns a form to login

    // Managing student password
    Route::get('/student/change_password', [UserController::class, 'change_password']);
    Route::post('/student/change_password', [UserController::class, 'update_password']);
});

Route::middleware(['parent'])->group(function(){
    Route::get('/parent/dashboard', [DashboardController::class, 'dashboard']); //returns a form to login

    // Managing parent password
    Route::get('/parent/change_password', [UserController::class, 'change_password']);
    Route::post('/parent/change_password', [UserController::class, 'update_password']);
});
