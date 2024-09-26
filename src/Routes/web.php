<?php

use Hanklobo\ZSCRUD\Http\Controllers\ConfigController;
use Hanklobo\ZSCRUD\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web','auth'])->group(function () {

    Route::prefix('landing-page')->group(function () {
        Route::get('/', [ConfigController::class, 'landingPageEdit'])->name('landing-page.edit');
        Route::put('/', [ConfigController::class, 'landingPageUpdate'])->name('landing-page.update');
        Route::post('/preview', [ConfigController::class, 'landingPagePreview'])->name('landing-page.preview');
    });

    Route::prefix('crud')->group(function () {
        Route::get('/', [CrudController::class, 'list'])->name('crud.list');

        Route::prefix('setup')->group(function () {
            Route::get('/', [CrudController::class, 'setup'])->name('crud.setup');
            Route::get('/create-entity', [CrudController::class, 'createEntity'])->name('crud.create-entity');
            Route::post('/create-entity', [CrudController::class, 'storeEntity'])->name('crud.store-entity');
        });

        Route::prefix('{slug}')->group(function () {
            Route::get('/', [CrudController::class, 'index'])->name('crud.index');
            Route::post('/', [CrudController::class, 'store'])->name('crud.store');
            Route::get('/create', [CrudController::class, 'create'])->name('crud.create');
        });
    });

    Route::prefix('page')->group(function () {
        Route::get('/', [PageController::class, 'list'])->name('page.list');
        Route::get('/setup', [PageController::class, 'setup'])->name('page.setup');

        // Route::get('/{slug}', [CrudController::class, 'index'])->name('crud.index');
        // Route::get('/{slug}/create', [CrudController::class, 'create'])->name('crud.create');
        // Route::post('/{slug}', [CrudController::class, 'store'])->name('crud.store');
    });

//    Route::get('/setup', [ConfigController::class, 'showConfigManager'])->name('config.manager');
//    Route::post('/config-manager', [ConfigController::class, 'updateConfig'])->name('config.update');
});
