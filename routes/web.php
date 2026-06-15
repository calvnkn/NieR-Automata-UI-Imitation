<?php

use App\Http\YoRHaControllers\OperationController;
use App\Http\YoRHaControllers\BunkerController;
use App\Http\YoRHaControllers\MissionController;
use App\Http\YoRHaControllers\InventoryController;
use App\Http\YoRHaControllers\WeaponController;
use App\Http\YoRHaControllers\ArchiveController;
use App\Http\YoRHaControllers\SystemController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BunkerController::class, 'index'])->name('bunker.index');
Route::post('/login', [BunkerController::class, 'login'])->name('bunker.login');

Route::group(['prefix' => 'operations'], function () {
    Route::get('/', [OperationController::class, 'index'])->name('operations.index');
    Route::get('/{key}', [OperationController::class, 'show'])->name('operations.show');
    Route::post('/{key}/deploy', [OperationController::class, 'deploy'])->name('operations.deploy');
});

Route::group(['prefix' => 'missions'], function () {
    Route::get('/', [MissionController::class, 'index'])->name('missions.index');
    Route::get('/{key}', [MissionController::class, 'show'])->name('missions.show');
    Route::post('/{key}/accept', [MissionController::class, 'accept'])->name('missions.accept');
});

Route::group(['prefix' => 'inventory'], function () {
    Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');
});

Route::group(['prefix' => 'weapons'], function () {
    Route::get('/', [WeaponController::class, 'index'])->name('weapons.index');
    Route::post('/{key}/equip', [WeaponController::class, 'equip'])->name('weapons.equip');
});

Route::group(['prefix' => 'archives'], function () {
    Route::get('/', [ArchiveController::class, 'index'])->name('archives.index');
    Route::get('/{key}', [ArchiveController::class, 'show'])->name('archives.show');
});

Route::group(['prefix' => 'system'], function () {
    Route::get('/', [SystemController::class, 'index'])->name('system.index');
    Route::post('/restart', [SystemController::class, 'restart'])->name('system.restart');
});

Route::fallback(function(){
    return "<img src='" . asset('Oops.png') . "' alt='Page Not Found' height='1080' width='1920'>";
});