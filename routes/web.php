<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index']); //returns a form to login
Route::post('/', [AuthController::class, 'login'])->name('login'); //triggers a function to login a user
Route::get('/logout', [AuthController::class, 'logout']); //returns a form to login







Route::middleware(['admin'])->group(function(){
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });


Route::get('/admin/admin/list', function () {
    return view('admin.admin.list');
});
});

Route::middleware(['teacher'])->group(function(){
    Route::get('/teacher/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::middleware(['student'])->group(function(){
    Route::get('/student/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::middleware(['parent'])->group(function(){
    Route::get('/parent/dashboard', function () {
        return view('admin.dashboard');
    });
});
