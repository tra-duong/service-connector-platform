<?php

use Illuminate\Support\Facades\Route;
use Modules\JobRequest\Http\Controllers\JobRequestListingController;

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

Route::prefix('v1')->group(function () {
    Route::prefix('job-request')->group(function () {
        Route::get('/latest', [JobRequestListingController::class, 'latest'])->name('job_request.latest');

        // Route::name('categorytype.')->prefix('types')->group(function () {
        //     Route::get('/', [CategoryTypeController::class, 'list'])->name('list');
        //     Route::prefix('handle')->group(function () {
        //         Route::get('/', [CategoryTypeController::class, 'build'])->name('build');
        //         Route::post('/', [CategoryTypeController::class, 'add'])->name('add');
        //         Route::patch('/', [CategoryTypeController::class, 'update'])->name('update');
        //         Route::delete('/', [CategoryTypeController::class, 'delete'])->name('delete');
        //     });
        // });
    });
});
