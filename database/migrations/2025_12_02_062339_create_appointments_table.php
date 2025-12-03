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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('hospital_id')->constrained()->onDelete('cascade');
            $table->dateTime('appointment_date');
            $table->dateTime('end_time');
            $table->enum('status', ['scheduled', 'confirmed', 'completed', 'cancelled', 'no_show'])->default('scheduled');
            $table->string('confirmation_code', 50)->unique();
            $table->boolean('reminder_sent')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('hospital_id');
            $table->index('appointment_date');
            $table->index('status');
            $table->index(['user_id', 'appointment_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
