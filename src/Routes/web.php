<?php

use Hanklobo\ZSCRUD\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

// Rotas logadas
Route::middleware(['web','auth'])->group(function () {

    Route::prefix('crud')->group(function () {
        Route::get('/{slug}', [CrudController::class, 'index'])->name('crud.index');
        Route::get('/{slug}/create', [CrudController::class, 'create'])->name('crud.create');
        Route::post('/{slug}', [CrudController::class, 'store'])->name('crud.store');
    });

});
