<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php

use App\Http\Controllers\ScoreController;

Route::put('/games/{game}/score', [ScoreController::class, 'update'])->name('games.update');
Route::get('/games/create', [ScoreController::class, 'create'])->name('games.create');
Route::post('/games', [ScoreController::class, 'store'])->name('games.store');
Route::get('/games', [ScoreController::class, 'index'])->name('games.index');