<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\VotesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\HomeNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VotingController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('user.home.index');
    });
    Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showregister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [HomeNewsController::class, 'index'])->name('user.home.index');
Route::get('/news/{id}', [HomeNewsController::class, 'show'])->name('user.show.index');
Route::get('/allnews', [HomeNewsController::class, 'allNews'])->name('user.allnews.index');

Route::prefix('user')->name('user.')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/voting', [VotingController::class, 'index'])->name('voting.index');
    Route::post('/voting', [VotingController::class, 'vote'])->name('voting.submit');
    
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
   Route::resource('votes', VotesController::class);
   Route::resource('news', NewsController::class);
});



