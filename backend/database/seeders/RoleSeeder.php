<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role menggunakan Spatie
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'tutor', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'pelajar', 'guard_name' => 'web']);
    }
}
