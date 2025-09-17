<?php

namespace App\Http\Controllers;

use App\Models\FinancialTransaction;
use Stancl\Tenancy\Database\Models\Tenant;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index($tenant_id)
    {
        $tenant = Tenant::find($tenant_id);
        if (!$tenant) {
            return response()->json(['message' => 'Tenant not found'], 404);
        }

        $tenant->initialize(); // tenant aktif hale geliyor

        $transactions = FinancialTransaction::all();
        return response()->json($transactions);
    }

    public function store(Request $request)
    {
        // Burada tenant db’ye kayıt atabilirsin
        return response()->json([
            'message' => 'Transaction created successfully',
        ], 201);
    }

}
