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
        Schema::create('fuel_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->foreignId('booking_id')->nullable()->constrained('bookings')->nullOnDelete();
            $table->date('date');
            $table->decimal('liters', 8, 2);
            $table->decimal('cost', 12, 2);
            $table->unsignedInteger('odometer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_logs');
    }
};
