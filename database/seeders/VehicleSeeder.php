<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        $vendor = Vendor::first();

        Vehicle::insert([
            ['plate_number' => 'DT 1001 AA', 'brand' => 'Toyota', 'model' => 'Hilux', 'type' => 'angkutan_orang', 'ownership' => 'milik_sendiri', 'year' => 2022, 'status' => 'available', 'vendor_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['plate_number' => 'DT 1002 AB', 'brand' => 'Mitsubishi', 'model' => 'Fuso', 'type' => 'angkutan_barang', 'ownership' => 'milik_sendiri', 'year' => 2021, 'status' => 'available', 'vendor_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['plate_number' => 'DT 1003 AC', 'brand' => 'Toyota', 'model' => 'Avanza', 'type' => 'angkutan_orang', 'ownership' => 'sewa', 'year' => 2023, 'status' => 'available', 'vendor_id' => $vendor->id, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
