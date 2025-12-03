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
        Schema::table('hospitals', function (Blueprint $table) {
            $table->string('website')->nullable();
            $table->boolean('is_24_7')->default(false);
            $table->json('blood_types_available')->nullable();
            $table->integer('bed_capacity')->nullable();
            $table->integer('available_beds_this_week')->nullable();
            $table->integer('available_beds_this_month')->nullable();
            $table->enum('status', ['active', 'pending', 'inactive'])->default('pending');

            // Add indexes for performance
            $table->index('status');
            $table->index(['status', 'province']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropIndex(['hospitals_status_index']);
            $table->dropIndex(['hospitals_status_province_index']);
            $table->dropColumn([
                'website',
                'is_24_7',
                'blood_types_available',
                'bed_capacity',
                'available_beds_this_week',
                'available_beds_this_month',
                'status'
            ]);
        });
    }
};
