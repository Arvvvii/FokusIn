<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan role admin sudah ada di database produksi
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@fokusin.com'],
            [
                'name' => 'Admin Vokasi',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'reputation_score' => 600,
            ]
        );

        $admin->assignRole('admin');
    }
}