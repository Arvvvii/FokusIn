<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutor_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Hari dalam seminggu: 'monday', 'tuesday', dst.
            $table->string('day_of_week');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            // Kombinasi user + hari harus unik (satu slot per hari per tutor)
            $table->unique(['user_id', 'day_of_week']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutor_schedules');
    }
};
