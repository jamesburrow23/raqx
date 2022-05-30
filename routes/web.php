<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Match Routes
    Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
    Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
    Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match}', [MatchController::class, 'show'])->name('matches.show');
    Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
    Route::put('/matches/{match}', [MatchController::class, 'update'])->name('matches.update');
    Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.delete');

    // Game Routes
    Route::get('/games', [GameController::class, 'index'])->name('games.index');
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');
    Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.delete');
});

Route::get('/logout', function() {
    auth()->logout();
});
