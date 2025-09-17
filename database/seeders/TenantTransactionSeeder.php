<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FinancialTransaction;

class TenantTransactionSeeder extends Seeder
{
    public function run(): void
    {
        FinancialTransaction::create([
            'description' => 'Initial Deposit',
            'amount' => 1000.00,
            'type' => 'income',
        ]);

        FinancialTransaction::create([
            'description' => 'Office Supplies',
            'amount' => 250.50,
            'type' => 'expense',
        ]);
    }
}
