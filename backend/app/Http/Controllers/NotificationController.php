<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Mengambil daftar notifikasi milik user yang sedang login (paginated).
     * GET /api/notifications
     */
    public function index(Request $request)
    {
        try {
            $notifications = $request->user()->notifications()->paginate(20);
            return response()->json($notifications);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil notifikasi.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Tandai satu notifikasi sebagai sudah dibaca.
     * POST /api/notifications/{id}/read
     */
    public function markAsRead(Request $request, $id)
    {
        try {
            $notification = $request->user()->notifications()->findOrFail($id);
            $notification->markAsRead();
            return response()->json(['message' => 'Notifikasi ditandai sudah dibaca.']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Notifikasi tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menandai notifikasi.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Tandai semua notifikasi sebagai sudah dibaca.
     * POST /api/notifications/read-all
     */
    public function markAllAsRead(Request $request)
    {
        try {
            $request->user()->unreadNotifications->markAsRead();
            return response()->json(['message' => 'Semua notifikasi ditandai sudah dibaca.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menandai semua notifikasi.', 'error' => $e->getMessage()], 500);
        }
    }
}
