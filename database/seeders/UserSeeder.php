<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $approverRole = Role::where('slug', 'approver')->first();

        User::create([
            'name' => 'Admin Pool',
            'email' => 'admin@nikelcorp.test',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Kepala Divisi (Approver 1)',
            'email' => 'approver1@nikelcorp.test',
            'password' => Hash::make('password'),
            'role_id' => $approverRole->id,
            'approval_level' => 1,
        ]);

        User::create([
            'name' => 'General Manager (Approver 2)',
            'email' => 'approver2@nikelcorp.test',
            'password' => Hash::make('password'),
            'role_id' => $approverRole->id,
            'approval_level' => 2,
        ]);
    }
}
