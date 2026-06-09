<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mentoring_sessions', function (Blueprint $table) {
            if (!Schema::hasColumn('mentoring_sessions', 'scheduled_at')) {
                $table->dateTime('scheduled_at')->nullable();
            }
            if (!Schema::hasColumn('mentoring_sessions', 'notes')) {
                $table->text('notes')->nullable();
            }
            if (!Schema::hasColumn('mentoring_sessions', 'files')) {
                $table->json('files')->nullable();
            }
            if (!Schema::hasColumn('mentoring_sessions', 'agenda_checklist')) {
                $table->json('agenda_checklist')->nullable();
            }
            if (!Schema::hasColumn('mentoring_sessions', 'status')) {
                $table->string('status')->default('pending');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mentoring_sessions', function (Blueprint $table) {
            $table->dropColumn(['scheduled_at', 'notes', 'files', 'agenda_checklist']);
            // We do not drop status here because it might have existed before.
        });
    }
};
