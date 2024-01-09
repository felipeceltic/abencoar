<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TeamsController;
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

// Padrão
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $page = 'home';
        return view('dashboard', compact('page'));
    })->name('dashboard');
});

Route::get('/error', function () {
    $page = 'error';
    return view('errors.404', compact('page'));
})->name('404');

// Jogadores livre
Route::post('player/{user}', [PlayerController::class, 'createOrUpdatePlayer'])->name('player.update');

// Administradores
Route::middleware('IsAdmin')->group(function () {
    // Jogadores
    Route::get('players', [PlayerController::class, 'index'])->name('player.index');

    // Estatisticas
    Route::get('statistics/show', [StatisticsController::class, 'showPlayerStatistics'])->name('player.statistics.show');
    Route::get('statistics/details/{player}', [StatisticsController::class, 'listPlayerStatistics'])->name('player.statistics.list');
    Route::post('statistics', [StatisticsController::class, 'updatePlayerStatistics'])->name('player.statistics.update');

    // Times
    Route::get('teams', [TeamsController::class, 'index'])->name('team.index');
    Route::get('team', [TeamsController::class, 'createTeam'])->name('team.create');
    Route::post('team', [TeamsController::class, 'storeTeam'])->name('team.store');
    Route::post('delete/teams/{teams}', [TeamsController::class, 'deleteTeam'])->name('team.delete');
});