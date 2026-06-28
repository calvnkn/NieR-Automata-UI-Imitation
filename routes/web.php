<?php

use App\Http\YoRHaControllers\Auth\AuthController;
use App\Http\YoRHaControllers\Hub\OperationController;
use App\Http\YoRHaControllers\Hub\BunkerController;
use App\Http\YoRHaControllers\Hub\MissionController;
use App\Http\YoRHaControllers\Hub\InventoryController;
use App\Http\YoRHaControllers\Hub\WeaponController;
use App\Http\YoRHaControllers\Hub\ArchiveController;
use App\Http\YoRHaControllers\Hub\SystemController;
use Illuminate\Support\Facades\Route;

// Landing and auth routes

Route::get('/', [AuthController::class, 'landing'])->name('landing');

Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit');

Route::get('/register', [AuthController::class, 'registerForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Hub routes

Route::get('/bunker', [BunkerController::class, 'index'])->name('bunker.index');

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
    Route::post('/{key}/unequip', [WeaponController::class, 'unequip'])->name('weapons.unequip');
});

Route::group(['prefix' => 'archives'], function () {
    Route::get('/', [ArchiveController::class, 'index'])->name('archives.index');
    Route::get('/{key}', [ArchiveController::class, 'show'])->name('archives.show');
});

Route::group(['prefix' => 'system'], function () {
    Route::get('/', [SystemController::class, 'index'])->name('system.index');
    Route::post('/restart', [SystemController::class, 'restart'])->name('system.restart');
});

Route::fallback(function () {
    return "<img src='" . asset('Oops.png') . "' alt='Page Not Found' height='1080' width='1920'>";
});