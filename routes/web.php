<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AnalysisController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    // Add these routes
    Route::get('/games', [GameController::class, 'index'])->name('games.index');
    Route::get('/analysis', [AnalysisController::class, 'show'])->name('analysis.show');

    // Your existing routes
    Route::get('/quiz', [QuizController::class, 'start'])->name('quiz.start');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/results/{score}', [QuizController::class, 'results'])->name('quiz.results');
    Route::get('/analysis', [AnalysisController::class, 'show'])->name('analysis.show');
});
