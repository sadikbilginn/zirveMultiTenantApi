<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TenantUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Tenant User',
            'email' => 'user@tenant.com',
            'password' => Hash::make('secret123'),
        ]);
    }
}
