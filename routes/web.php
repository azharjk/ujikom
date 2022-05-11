<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\JourneyController;
use App\Http\Controllers\AuthenticationController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('page.home');
    Route::get('/catatan-perjalanan', [PageController::class, 'catatanPerjalanan'])->name('page.catatan-perjalanan');
    Route::get('/tambah-catatan-perjalanan', [PageController::class, 'tambahCatatanPerjalanan'])->name('page.tambah-catatan-perjalanan');

    Route::post('/tambah-catatan-perjalanan', [JourneyController::class, 'tambahkan'])->name('journey.tambahkan');
    Route::post('/urutkan-catatan-perjalanan', [JourneyController::class, 'urutkan'])->name('journey.urutkan');

    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticationController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthenticationController::class, 'loginUser'])->name('auth.login-user');

    Route::get('/register', [AuthenticationController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthenticationController::class, 'registerNewUser'])->name('auth.register-new-user');
});
