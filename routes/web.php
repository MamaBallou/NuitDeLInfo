<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ActuController;
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

Route::get('/', [AccueilController::class, 'index'])->name('accueil.index');

Route::get('/actu', [ActuController::class, 'index'])->name('actu.index');

Route::get('/quizz', [QuizzController::class, 'index'])->name('quizz.index');
