<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ActuController;
use App\Http\Controllers\EscapeGameController;
use App\Http\Controllers\QuizzController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AccueilController::class, 'index'])->name('accueil.root');
Route::get('/accueil', [AccueilController::class, 'index'])->name('accueil.index');

Route::get('/actualites', [ActuController::class, 'index'])->name('actualites.index');

Route::get('/quizz', [QuizzController::class, 'index'])->name('quizz.index');

Route::get('/escape-game', [EscapeGameController::class, 'index'])->name('escape_game.index');
