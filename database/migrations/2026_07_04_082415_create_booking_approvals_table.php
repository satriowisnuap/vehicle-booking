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
        Schema::create('booking_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('approver_id')->constrained('users');
            $table->unsignedTinyInteger('level'); // 1 atau 2
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('comment')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();

            $table->unique(['booking_id', 'level']); // 1 booking hanya 1 baris per level
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_approvals');
    }
};
