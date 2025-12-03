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
            // Rename province to region
            $table->renameColumn('province', 'region');

            // Remove old capacity fields
            $table->dropColumn(['available_beds_this_week', 'available_beds_this_month']);

            // Add new monthly capacity field
            $table->integer('monthly_capacity')->nullable();

            // Replace is_24_7 with operating_hours
            $table->dropColumn('is_24_7');
            $table->string('operating_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hospitals', function (Blueprint $table) {
            // Rename region back to province
            $table->renameColumn('region', 'province');

            // Restore old capacity fields
            $table->integer('available_beds_this_week')->nullable();
            $table->integer('available_beds_this_month')->nullable();

            // Remove monthly capacity
            $table->dropColumn('monthly_capacity');

            // Restore is_24_7
            $table->boolean('is_24_7')->default(false);

            // Remove operating_hours
            $table->dropColumn('operating_hours');
        });
    }
};
