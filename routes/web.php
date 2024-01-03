<?php

use App\Http\Controllers\PlayerController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

// Jogadores
Route::post('player/{user}', [PlayerController::class, 'createOrUpdatePlayer'])->name('createUpdatePlayer');
Route::post('statistics/{player}', [PlayerController::class, 'updatePlayerStatistics'])->name('updatePlayerStatistics');

// Times
Route::get('teams', [TeamsController::class, 'index'])->name('team.index');
Route::get('team', [TeamsController::class, 'createTeam'])->name('team.create');
Route::post('team', [TeamsController::class, 'storeTeam'])->name('team.store');
Route::post('delete/teams/{teams}', [TeamsController::class, 'deleteTeam'])->name('team.delete');


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
