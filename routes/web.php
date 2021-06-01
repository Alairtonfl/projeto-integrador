<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TeamTournamentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;

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

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/tournament/{id}', [App\Http\Controllers\TournamentController::class, 'index'])->name('indexTournament');
Route::post('/tournament/create', [App\Http\Controllers\TournamentController::class, 'create'])->name('createTournament');

Route::get('/team/{id}', [App\Http\Controllers\TeamController::class, 'index'])->name('indexTeam');
Route::post('/team/create/{tournament_id}', [App\Http\Controllers\TeamController::class, 'create'])->name('createTeam');
Route::post('/includeteam/{tournament_id}', [App\Http\Controllers\TournamentController::class, 'includeTeam'])->name('includeTeam');

Route::get('/matchs', [App\Http\Controllers\MatchsController::class, 'index']);
Route::post('/stats/create/{tournament_id}', [App\Http\Controllers\StatsController::class, 'create'])->name('createStats');

Route::get('/auth/redirect', [App\Http\Controllers\Auth\LoginController::class, 'loginGoogle'])->name('loginGoogle');
Route::get('/auth/callback', [App\Http\Controllers\Auth\LoginController::class, 'loginCallback'])->name('loginCallback');
