<?php

use App\Http\Controllers\CategoryFormationController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserFormationController;
use App\Http\Controllers\UserController;
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
Route::post('/formations/search', [FormationController::class, 'search'])->name('formations.search');

Route::get('confirm-registration', [UserController::class, 'store'])->name('confirm-registration');

Route::name('categories.')->prefix('categories')->group(function () {
    Route::get('{category}/formations', CategoryFormationController::class)->name('formations');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::name('user.')->group(function () {
        Route::name('formations.')->prefix('formations')->group(function () {
            Route::get('/', [UserFormationController::class, 'index'])->name('index');
            Route::post('/search', [UserFormationController::class, 'search'])->name('search');
            Route::get('/create', [UserFormationController::class, 'create'])->name('create');
            Route::post('/store', [UserFormationController::class, 'store'])->name('store');

            Route::middleware('owner')->group(function() {
                Route::get('{formation}/edit', [UserFormationController::class, 'edit'])->name('edit');
                Route::put('{formation}/update', [UserFormationController::class, 'update'])->name('update');
                Route::get('{formation}/destroy', [UserFormationController::class, 'destroy'])->name('destroy');
            });

        });

        Route::name('profile.')->group(function () {
            Route::get('profile', [UserProfileController::class, 'showProfil'])->name('show');
            Route::put('profile-update', [UserProfileController::class, 'updateProfile'])->name('update');
            Route::put('password-update', [UserProfileController::class, 'updatePassword'])->name('password-update');
        });
    });

    Route::middleware('admin')->name('admin.')->prefix('admin')->group(function () {
        Route::name('formations.')->prefix('formations')->group(function () {
            Route::get('/', [FormationController::class, 'index'])->name('index');
            Route::get('/{formation}/destroy', [UserFormationController::class, 'destroy'])->name('destroy');
        });

        Route::resource('users', UserController::class)->except(['show', 'edit', 'update']);
    });
});

Route::get('/test', function () {
    return view('layouts.email');
});
