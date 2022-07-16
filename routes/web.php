<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Authentication;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::group(['middleware' => ['authenticate']], function() {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/show/', [UserController::class, 'show'])->name('users.show');
        Route::get('users/{id}', [UserController::class, 'get'])->name('users.get');

        Route::get('/profile',[UserController::class,'profile'])->name('profile');
        Route::post('/profile-update',[UserController::class,'profile_update'])->name('profile-update');

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
    });


