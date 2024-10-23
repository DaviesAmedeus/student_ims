<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index']); //returns a form to login
Route::post('/', [AuthController::class, 'login'])->name('login'); //triggers a function to login a user
Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); //returns a form to login
Route::get('/forgot_password', [AuthController::class, 'forgotPassword'])->name('forgot_password'); //returns a form to reset a password
Route::post('/reset', [AuthController::class, 'reset'])->name('reset_password'); //accepts a post request to reset a password
Route::get('/reset/{token}', [AuthController::class, 'reseted'])->name('reseted_password');
Route::post('/reset/{token}', [AuthController::class, 'postReset']);








Route::middleware(['admin'])->group(function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']); //returns a form to login
    Route::get('/admin/admin/list', [AdminController::class, 'list']);
    Route::get('/admin/admin/add', [AdminController::class, 'add']);
    Route::post('/admin/admin/add', [AdminController::class, 'insert']);
    Route::get('/admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('/admin/admin/delete/{id}', [AdminController::class, 'delete']);





});

Route::middleware(['teacher'])->group(function(){
    Route::get('/teacher/dashboard', [DashboardController::class, 'dashboard']); //returns a form to login


});

Route::middleware(['student'])->group(function(){
    Route::get('/student/dashboard', [DashboardController::class, 'dashboard']); //returns a form to login

});

Route::middleware(['parent'])->group(function(){
    Route::get('/parent/dashboard', [DashboardController::class, 'dashboard']); //returns a form to login

});
