<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php

use App\Http\Controllers\ScoreController;


Route::get('/games/create', [ScoreController::class, 'create'])->name('games.create');
Route::post('/games', [ScoreController::class, 'store'])->name('games.store');
Route::get('/games', [ScoreController::class, 'index'])->name('games.index');
// routes/web.php

Route::get('/games/{game}/edit', [ScoreController::class, 'edit'])->name('games.edit');
Route::put('/games/{game}', [ScoreController::class, 'update'])->name('games.update');
// routes/web.php

Route::delete('/games/{game}', [ScoreController::class, 'destroy'])->name('games.destroy');

// routes/web.php

Route::get('/games/{game}/edit-score', [ScoreController::class, 'editScore'])->name('games.editScore');
Route::put('/games/{game}/update-score', [ScoreController::class, 'updateScore'])->name('games.updateScore');
