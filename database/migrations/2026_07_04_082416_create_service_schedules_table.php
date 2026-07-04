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
        Schema::create('service_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->string('service_type'); // rutin, perbaikan, ganti oli, dll
            $table->date('scheduled_date');
            $table->date('completed_date')->nullable();
            $table->unsignedInteger('odometer_at_service')->nullable();
            $table->decimal('cost', 12, 2)->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['scheduled', 'completed', 'overdue'])->default('scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_schedules');
    }
};
