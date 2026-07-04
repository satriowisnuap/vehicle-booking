<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        Vendor::insert([
            ['name' => 'PT Sewa Kendaraan Jaya', 'contact_person' => 'Budi', 'phone' => '081234567890', 'address' => 'Jakarta', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CV Rental Tambang Sejahtera', 'contact_person' => 'Siti', 'phone' => '081298765432', 'address' => 'Kendari', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
