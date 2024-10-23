<?php

use Illuminate\Support\Facades\Route;
use Modules\Province\Http\Controllers\ProvinceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix(prefix: 'province')->group(function () {
    Route::prefix('city')->group(function () {
        Route::get('/', [ProvinceController::class, 'getAllCities'])->name('city.all');
        Route::get('{cityId}', [ProvinceController::class, 'getCityById'])->name('city.get');
        Route::get('{cityId}/districts', [ProvinceController::class, 'getAllDistrictsByCity'])->name('city.district');
        Route::get('{cityId}/wards', [ProvinceController::class, 'getAllWardsByCity'])->name('city.ward');
    });
    Route::prefix('district')->group(function () {
        Route::get('{districtId}', [ProvinceController::class, 'getDistrictById'])->name('district.get');
        Route::get('{districtId}/city', [ProvinceController::class, 'getCityByDistrictId'])->name('district.city');
        Route::get('{districtId}/wards', [ProvinceController::class, 'getAllWardsByDistrictId'])->name('district.ward');
    });
    Route::prefix('ward')->group(function () {
        Route::get('{wardId}', [ProvinceController::class, 'getWardById'])->name('ward.get');
        Route::get('{wardId}/city', [ProvinceController::class, 'getCityByWardId'])->name('ward.city');
        Route::get('{wardId}/district', [ProvinceController::class, 'getDistrictByWardId'])->name('ward.district');
    });
});
