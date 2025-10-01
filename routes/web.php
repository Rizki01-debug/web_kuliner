<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MenuController as FrontMenuController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MenuController as BackendMenuController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Frontend\AboutController as FrontAboutController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\ProfileController;

// =====================
// Frontend
// =====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [FrontMenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{menu}', [FrontMenuController::class, 'show'])->name('menu.show');
Route::get('/about', [FrontAboutController::class, 'index'])->name('about.index');

// =====================
// Backoffice (prefix + middleware)
// =====================
Route::prefix('backoffice')
    ->name('backoffice.')
    ->middleware(['auth','is_admin'])
    ->group(function () {
        
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Manajemen user
        Route::resource('users', UserController::class)->names('users');

        // Manajemen menu (konten kuliner)
        Route::resource('menus', BackendMenuController::class)->names('menus');

         Route::resource('about', AboutController::class);

         Route::resource('footer', FooterController::class);

         Route::resource('services', ServiceController::class);

    });

// =====================
// Profile (Breeze default)
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =====================
// Auth routes (Breeze)
// =====================
require __DIR__.'/auth.php';
