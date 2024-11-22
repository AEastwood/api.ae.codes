<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\Scores\ScoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DefaultController::class, 'index'])->name('index');

Route::prefix('scores')->controller(ScoreController::class)->as('scores.')->group(function () {
    Route::get('/{game}', 'index')->name('index');
    Route::post('', 'store')->name('store');
});
