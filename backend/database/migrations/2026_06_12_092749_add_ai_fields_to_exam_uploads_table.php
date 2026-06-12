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
        Schema::table('exam_uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('exam_uploads', 'title')) {
                $table->string('title')->nullable()->after('category_id');
            }
            if (!Schema::hasColumn('exam_uploads', 'ai_analysis')) {
                $table->json('ai_analysis')->nullable()->after('original_filename');
            }
            if (!Schema::hasColumn('exam_uploads', 'quiz_set_id')) {
                $table->foreignId('quiz_set_id')->nullable()->after('ai_analysis')->constrained('quiz_sets')->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_uploads', function (Blueprint $table) {
            $table->dropConstrainedForeignId('quiz_set_id');
            $table->dropColumn(['title', 'ai_analysis']);
        });
    }
};
