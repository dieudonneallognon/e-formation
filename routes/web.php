<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFormationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('formations.index');
})->name('index');

Route::resource('formations', FormationController::class)->only(['index', 'show']);

Route::get('confirm-registration', AdminUserController::class)->name('confirm-registration');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::name('user.')->group(function () {
        Route::name('formations.')->prefix('formations')->group(function () {
            Route::get('/', [UserFormationController::class, 'index'])->name('index');
            Route::get('/create', [UserFormationController::class, 'create'])->name('create');
            Route::post('/store', [UserFormationController::class, 'store'])->name('store');
            Route::get('{formation}/edit', [UserFormationController::class, 'edit'])->name('edit');
            Route::put('{formation}/update', [UserFormationController::class, 'update'])->name('update');
            Route::get('{formation}/destroy', [UserFormationController::class, 'destroy'])->name('destroy');
        });

        Route::name('profile.')->group(function () {
            Route::get('profile', [UserController::class, 'showProfil'])->name('show');
            Route::put('profile-update', [UserController::class, 'updateProfile'])->name('update');
            Route::put('password-update', [UserController::class, 'updatePassword'])->name('password-update');
        });
    });

    Route::name('admin.')->prefix('admin')->group(function () {
        Route::name('formations.')->prefix('formations')->group(function () {
            Route::get('/', [FormationController::class, 'index'])->name('index');
            Route::get('/{formation}/destroy', [UserFormationController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::get('/test', function () {
    return view('layouts.email');
});
