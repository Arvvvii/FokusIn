<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Helper: pastikan request datang dari admin.
     */
    private function authorizeAdmin(): ?\Illuminate\Http\JsonResponse
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak. Hanya admin yang diizinkan.'], 403);
        }
        return null;
    }

    /**
     * Tampilkan semua user (paginasi).
     * GET /api/users
     */
    public function index(Request $request)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $users = User::query()
                ->when($request->role, fn($q, $role) => $q->where('role', $role))
                ->when($request->search, fn($q, $s) => $q->where('name', 'like', "%{$s}%")
                    ->orWhere('email', 'like', "%{$s}%"))
                ->latest()
                ->paginate(15);

            return response()->json($users);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil data user.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Buat user baru.
     * POST /api/users
     */
    public function store(Request $request)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $validated = $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role'     => 'required|in:pelajar,tutor,admin',
            ]);

            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role'     => $validated['role'],
            ]);

            return response()->json([
                'message' => 'User berhasil dibuat.',
                'user'    => $user,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membuat user.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update data user.
     * PUT /api/users/{id}
     */
    public function update(Request $request, $id)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $user = User::findOrFail($id);

            $validated = $request->validate([
                'name'     => 'sometimes|string|max:255',
                'email'    => 'sometimes|email|unique:users,email,' . $id,
                'password' => 'sometimes|string|min:8',
                'role'     => 'sometimes|in:pelajar,tutor,admin',
            ]);

            if (isset($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            }

            $user->update($validated);

            return response()->json([
                'message' => 'User berhasil diperbarui.',
                'user'    => $user->fresh(),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'User tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui user.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Hapus user.
     * DELETE /api/users/{id}
     */
    public function destroy($id)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $user = User::findOrFail($id);

            // Cegah admin menghapus akunnya sendiri
            if ($user->id === auth()->id()) {
                return response()->json(['message' => 'Anda tidak dapat menghapus akun Anda sendiri.'], 422);
            }

            $user->delete();

            return response()->json(['message' => 'User berhasil dihapus.']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'User tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus user.', 'error' => $e->getMessage()], 500);
        }
    }
}
