<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Services\BadgeService; // Kita siapkan import-nya dari sekarang

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. Validasi input (Mencegah pendaftaran Admin secara liar)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:pelajar,tutor'
        ]);

        // 2. Buat User baru dengan data yang sudah tervalidasi (Aman dari Mass-Assignment)
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        // 3. Sinkronisasikan role dengan Spatie Laravel-Permission
        $user->assignRole($validated['role']);

        // 4. Buat Token Sanctum
        $token = $user->createToken('fokus-in-token')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    public function login(Request $request)
    {
        // 1. Validasi email dan password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Cek kredensial
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Email atau password salah.'], 401);
        }

        $user = User::where('email', $request->email)->first();
        
        // 3. Hapus token lama agar tidak menumpuk
        $user->tokens()->delete(); 
        
        // 4. Buat token baru
        $token = $user->createToken('fokus-in-token')->plainTextToken;

        return response()->json([
            'user' => $user->load('badges'),
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        // Hapus token yang sedang digunakan saat ini
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Berhasil logout.'], 200);
    }

    public function me(Request $request)
    {
        // Ambil data user yang sedang login beserta data badgenya
        $user = $request->user()->load('badges');
        
        return response()->json(['data' => $user]);
    }
}
