<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan role sudah ada (opsional, sebagai pencegahan error)
        $roles = ['pelajar', 'tutor', 'admin'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }

        $users = [
            [
                'name' => 'Pelajar Demo',
                'email' => 'siswa@fokusin.com',
                'role' => 'pelajar'
            ],
            [
                'name' => 'Tutor Mentor Demo',
                'email' => 'tutor@fokusin.com',
                'role' => 'tutor'
            ],
            [
                'name' => 'Administrator Utama',
                'email' => 'admin@fokusin.com',
                'role' => 'admin'
            ]
        ];

        foreach ($users as $userData) {
            // Hapus user lama dengan email yang sama untuk menghindari duplicate error
            User::where('email', $userData['email'])->delete();

            // Buat user baru
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);

            // Assign role menggunakan Spatie
            $user->assignRole($userData['role']);
        }
    }
}
