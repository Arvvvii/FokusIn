<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menambahkan kolom untuk fitur Tutor Validation Workspace (Sprint 7).
     */
    public function up(): void
    {
        Schema::table('exam_uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('exam_uploads', 'status')) {
                // pending | valid | invalid
                $table->string('status')->default('pending')->after('cloudinary_public_id');
            }
            if (!Schema::hasColumn('exam_uploads', 'validation_notes')) {
                $table->text('validation_notes')->nullable()->after('status');
            }
            if (!Schema::hasColumn('exam_uploads', 'original_filename')) {
                $table->string('original_filename')->nullable()->after('validation_notes');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_uploads', function (Blueprint $table) {
            $table->dropColumn(['status', 'validation_notes', 'original_filename']);
        });
    }
};
