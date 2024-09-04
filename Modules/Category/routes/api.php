<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;
use Modules\Category\Http\Controllers\CategoryTypeController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
 */
// routes/api.php
Route::prefix('v1')->group(function () {
  Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'list'])->name('categories.list');

    Route::name('categorytype.')->prefix('types')->group(function () {
      Route::get('/', [CategoryTypeController::class, 'list'])->name('list');
      Route::prefix('handle')->group(function () {
        Route::get('/', [CategoryTypeController::class, 'build'])->name('build');
        Route::post('/', [CategoryTypeController::class, 'add'])->name('add');
        Route::patch('/', [CategoryTypeController::class, 'update'])->name('update');
        Route::delete('/', [CategoryTypeController::class, 'delete'])->name('delete');
      });
    });

    Route::prefix('category')->group(function () {
      Route::get('/', [CategoryController::class, 'list']);
      Route::prefix('handle')->group(function () {
        Route::get('/', [CategoryController::class, 'build']);
        Route::post('/', [CategoryController::class, 'add']);
        Route::patch('/', [CategoryController::class, 'update']);
        Route::delete('/', [CategoryController::class, 'delete']);
      });
    });
  });
});
