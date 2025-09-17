<?php

declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FinancialTransactionController;

Route::middleware(['tenant', 'auth:api'])->group(function () {
    Route::post('/transactions', [FinancialTransactionController::class, 'store']);
    Route::get('/transactions', [FinancialTransactionController::class, 'index']);
});

