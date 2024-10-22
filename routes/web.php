<?php

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



Route::get('/admin/admin/list', function () {
    return view('admin.admin.list');
});
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
