<?php

use Hanklobo\ZSCRUD\Http\Controllers\ConfigController;
use Hanklobo\ZSCRUD\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web','auth'])->group(function () {

    Route::get('/landing-page', [ConfigController::class, 'landingPageEdit'])->name('landing-page.edit');
    Route::put('/landing-page', [ConfigController::class, 'landingPageUpdate'])->name('landing-page.update');
    Route::post('/landing-page/preview', [ConfigController::class, 'landingPagePreview'])->name('landing-page.preview');

    Route::prefix('crud')->group(function () {
        Route::get('/', [CrudController::class, 'list'])->name('crud.list');
        Route::get('/{slug}', [CrudController::class, 'index'])->name('crud.index');
        Route::get('/{slug}/create', [CrudController::class, 'create'])->name('crud.create');
        Route::post('/{slug}', [CrudController::class, 'store'])->name('crud.store');
    });

//    Route::get('/setup', [ConfigController::class, 'showConfigManager'])->name('config.manager');
//    Route::post('/config-manager', [ConfigController::class, 'updateConfig'])->name('config.update');
});
