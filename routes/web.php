<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth'])->group( function(){
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])
        ->name('settings.index');

    Route::put('/settings/portfolio', [PortfolioController::class, 'update'])
        ->name('settings.portfolio.update');

    Route::get('/settings/categories', [CategoryController::class, 'index'])
        ->name('settings.categories.index');
    Route::post('/settings/categories', [CategoryController::class, 'store'])
        ->name('settings.categories.store');
    Route::put('/settings/categories/{category}', [CategoryController::class, 'update'])
        ->name('settings.categories.update');
    Route::delete('/settings/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('settings.categories.delete');
        
    Route::get('/settings/institutions', [InstitutionController::class, 'index'])
        ->name('settings.institutions.index');
    Route::post('/settings/institutions', [InstitutionController::class, 'store'])
        ->name('settings.institutions.store');
    Route::put('/settings/institutions/{institution}', [InstitutionController::class, 'update'])
        ->name('settings.institutions.update');
    Route::delete('/settings/institutions/{institution}', [InstitutionController::class, 'destroy'])
        ->name('settings.institutions.delete');
    
    
    
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
