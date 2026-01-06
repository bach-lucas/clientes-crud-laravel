<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

Route::get('/players', [PlayerController::class, 'index']); // Get all players
Route::post('/players', [PlayerController::class, 'store']); // Create a new player
Route::get('/players/{player}', [PlayerController::class, 'show']); // Get a specific player
Route::put('/players/{player}', [PlayerController::class, 'update']); // Update player
Route::delete('/players/{player}', [PlayerController::class, 'delete']); // Delete player

