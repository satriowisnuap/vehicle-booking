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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->unique();
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->foreignId('driver_id')->constrained('drivers');
            $table->foreignId('requested_by')->constrained('users'); // admin yang input
            $table->string('employee_name'); // pegawai pemohon
            $table->string('employee_department')->nullable();
            $table->string('purpose');
            $table->string('destination');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->enum('status', [
                'pending',
                'approved_level_1',
                'approved',
                'rejected',
                'completed',
                'cancelled',
            ])->default('pending');
            $table->unsignedTinyInteger('current_approval_level')->default(1);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
