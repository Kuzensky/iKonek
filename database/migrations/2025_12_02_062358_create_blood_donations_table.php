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
        Schema::create('blood_donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('hospital_id')->constrained()->onDelete('cascade');
            $table->foreignId('appointment_id')->nullable()->constrained()->onDelete('set null');
            $table->dateTime('donation_date');
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->enum('status', ['completed', 'verified', 'rejected'])->default('completed');
            $table->integer('lives_impacted')->default(3);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('hospital_id');
            $table->index('donation_date');
            $table->index('status');
            $table->index(['user_id', 'donation_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_donations');
    }
};
