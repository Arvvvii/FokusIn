<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * POST /api/reports
     * User men-submit laporan terhadap post atau user lain.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reported_id'   => 'required|integer',
            'reported_type' => 'required|string|in:post,user',
            'reason'        => 'required|string|max:1000',
        ]);

        // Validasi bahwa entitas yang dilaporkan benar-benar ada
        if ($validated['reported_type'] === 'post') {
            Post::findOrFail($validated['reported_id']);
        } elseif ($validated['reported_type'] === 'user') {
            User::findOrFail($validated['reported_id']);
        }

        // Cegah user melaporkan dirinya sendiri
        if ($validated['reported_type'] === 'user' && $validated['reported_id'] == auth()->id()) {
            return response()->json(['message' => 'Anda tidak dapat melaporkan diri sendiri.'], 422);
        }

        // Cegah laporan duplikat dari user yang sama terhadap entitas yang sama
        $alreadyReported = Report::where('reporter_id', auth()->id())
            ->where('reported_id', $validated['reported_id'])
            ->where('reported_type', $validated['reported_type'])
            ->where('status', 'pending')
            ->exists();

        if ($alreadyReported) {
            return response()->json(['message' => 'Anda sudah melaporkan item ini dan laporan masih dalam proses.'], 409);
        }

        $report = Report::create([
            'reporter_id'   => auth()->id(),
            'reported_id'   => $validated['reported_id'],
            'reported_type' => $validated['reported_type'],
            'reason'        => $validated['reason'],
            'status'        => 'pending',
        ]);

        return response()->json([
            'message' => 'Laporan berhasil dikirim. Tim moderasi akan segera meninjau.',
            'report'  => $report,
        ], 201);
    }
}
