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
        // Drop the existing CHECK constraint
        DB::statement("ALTER TABLE fundraisers DROP CONSTRAINT IF EXISTS fundraisers_status_check");

        // Add the new CHECK constraint with suspended status
        DB::statement("
            ALTER TABLE fundraisers
            ADD CONSTRAINT fundraisers_status_check
            CHECK (status::text = ANY (ARRAY[
                'draft'::character varying,
                'pending_review'::character varying,
                'active'::character varying,
                'completed'::character varying,
                'cancelled'::character varying,
                'suspended'::character varying
            ]::text[]))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the constraint with suspended
        DB::statement("ALTER TABLE fundraisers DROP CONSTRAINT IF EXISTS fundraisers_status_check");

        // Restore the original constraint without suspended
        DB::statement("
            ALTER TABLE fundraisers
            ADD CONSTRAINT fundraisers_status_check
            CHECK (status::text = ANY (ARRAY[
                'draft'::character varying,
                'pending_review'::character varying,
                'active'::character varying,
                'completed'::character varying,
                'cancelled'::character varying
            ]::text[]))
        ");
    }
};
