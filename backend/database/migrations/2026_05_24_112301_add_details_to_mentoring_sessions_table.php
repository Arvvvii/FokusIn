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
            $table->string('title')->after('student_id');
            $table->text('description')->after('title');
            $table->unsignedInteger('duration_minutes')->after('description');
            $table->text('student_message')->nullable()->after('duration_minutes');
            $table->unsignedInteger('price')->default(25000)->after('student_message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mentoring_sessions', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'duration_minutes', 'student_message', 'price']);
        });
    }
};
