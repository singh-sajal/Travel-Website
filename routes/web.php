<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'loginPage'])->name('auth.login');
        Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    });

    Route::middleware('auth', 'revalidateSession')->group(function () {

        Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});
