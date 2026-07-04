<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        Driver::insert([
            ['name' => 'Andi Saputra', 'license_number' => 'SIM-B1-0001', 'phone' => '081211112222', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Budi Santoso', 'license_number' => 'SIM-B1-0002', 'phone' => '081233334444', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Candra Wijaya', 'license_number' => 'SIM-B2-0003', 'phone' => '081255556666', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
