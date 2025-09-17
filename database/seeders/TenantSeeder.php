<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Stancl\Tenancy\Database\Models\Tenant;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        // Tenant oluştur
        $tenant = Tenant::create([
            'id' => 'tenant1',
            'data' => ['name' => 'Tenant 1'],
        ]);

        $tenant->domain = 'tenant1.localhost';
        $tenant->save();

        \Artisan::call('tenants:migrate', [
            '--tenants' => [$tenant->id],
            '--force' => true,
        ]);

        // Opsiyonel: Tenant seed çalıştır
        // \Artisan::call('tenants:seed', [
        //     '--tenants' => [$tenant->id],
        //     '--class' => 'DatabaseSeeder',
        //     '--force' => true,
        // ]);

        echo "Tenant '{$tenant->id}' and domain '{$tenant->domain}' created.\n";
    }

}
