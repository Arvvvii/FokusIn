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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporter_id')
                  ->constrained('users')
                  ->cascadeOnDelete();
            $table->unsignedBigInteger('reported_id');       // ID dari entitas yang dilaporkan
            $table->string('reported_type');                 // 'post' atau 'user'
            $table->text('reason');                          // Alasan pelaporan
            $table->string('status')->default('pending');    // 'pending' atau 'resolved'
            $table->timestamps();

            // Index untuk mempercepat query berdasarkan tipe + id entitas yang dilaporkan
            $table->index(['reported_type', 'reported_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
