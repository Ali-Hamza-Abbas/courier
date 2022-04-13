<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

    // Login Routes Start

    Route::get('/', function () {
        return view('login/index');
    });

    // login Routes End

    // Users Routes

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/show/', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{id}', [UserController::class, 'get'])->name('users.get');
    // Users Routes

    Route::middleware(['auth'])->group(function () {

    });


