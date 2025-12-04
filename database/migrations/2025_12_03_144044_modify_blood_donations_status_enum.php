<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop existing status constraint
        DB::statement("ALTER TABLE blood_donations DROP CONSTRAINT IF EXISTS blood_donations_status_check");

        // Migrate existing data to new status values
        DB::table('blood_donations')
            ->where('status', 'completed')
            ->update(['status' => 'pending']);

        DB::table('blood_donations')
            ->where('status', 'rejected')
            ->update(['status' => 'failed']);

        // Add new constraint with updated enum values
        DB::statement("ALTER TABLE blood_donations ADD CONSTRAINT blood_donations_status_check CHECK (status::text = ANY (ARRAY['pending'::character varying, 'verified'::character varying, 'failed'::character varying, 'cancelled'::character varying]::text[]))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop new constraint
        DB::statement("ALTER TABLE blood_donations DROP CONSTRAINT IF EXISTS blood_donations_status_check");

        // Revert data migrations
        DB::table('blood_donations')
            ->where('status', 'pending')
            ->update(['status' => 'completed']);

        DB::table('blood_donations')
            ->where('status', 'failed')
            ->update(['status' => 'rejected']);

        // Restore original constraint
        DB::statement("ALTER TABLE blood_donations ADD CONSTRAINT blood_donations_status_check CHECK (status::text = ANY (ARRAY['completed'::character varying, 'verified'::character varying, 'rejected'::character varying]::text[]))");
    }
};
