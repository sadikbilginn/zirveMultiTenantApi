<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant\FinancialTransaction;

class FinancialTransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'transaction_date' => 'required|date',
        ]);

        $transaction = FinancialTransaction::create([
            'amount' => $request->amount,
            'description' => $request->description,
            'transaction_date' => $request->transaction_date,
        ]);

        return response()->json([
            'success' => true,
            'data' => $transaction,
        ]);
    }

    // Tüm transactionları listeleme (opsiyonel)
    public function index()
    {
        $transactions = FinancialTransaction::all();
        return response()->json($transactions);
    }
}
