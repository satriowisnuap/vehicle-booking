<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            ['name' => 'Admin', 'slug' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Approver', 'slug' => 'approver', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
