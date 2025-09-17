<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\TenantLoginController;

Route::prefix('v1')->group(function () {

//    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/tenant-login', [TenantLoginController::class, 'login']);

});

//require __DIR__ . '/tenant.php';
