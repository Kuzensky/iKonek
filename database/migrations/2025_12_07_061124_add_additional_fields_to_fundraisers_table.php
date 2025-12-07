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
        Schema::table('fundraisers', function (Blueprint $table) {
            // Beneficiary information
            $table->string('beneficiary_relationship', 100)->nullable()->after('beneficiary_name');
            $table->text('beneficiary_address')->nullable()->after('beneficiary_contact');

            // Organizer information
            $table->string('organizer_name')->nullable()->after('beneficiary_address');
            $table->string('organizer_email')->nullable()->after('organizer_name');
            $table->string('organizer_phone', 20)->nullable()->after('organizer_email');

            // Payment information
            $table->string('payment_method', 50)->nullable()->after('organizer_phone');
            $table->string('account_number', 255)->nullable()->after('payment_method'); // Will be encrypted
            $table->string('account_name')->nullable()->after('account_number');

            // Campaign details
            $table->integer('campaign_duration_days')->default(30)->after('account_name');

            // Status and verification
            $table->text('admin_notes')->nullable()->after('status');
            $table->timestamp('verified_at')->nullable()->after('admin_notes');
            $table->foreignId('verified_by')->nullable()->constrained('admins')->onDelete('set null')->after('verified_at');

            // Terms agreement
            $table->boolean('terms_agreed')->default(false)->after('verified_by');
            $table->boolean('information_accurate')->default(false)->after('terms_agreed');

            // Update status enum to match new requirements
            $table->dropColumn('status');
        });

        Schema::table('fundraisers', function (Blueprint $table) {
            $table->enum('status', ['pending', 'active', 'completed', 'suspended', 'cancelled'])->default('pending')->after('end_date');
        });

        // Update category enum to add 'emergency'
        Schema::table('fundraisers', function (Blueprint $table) {
            $table->dropColumn('category');
        });

        Schema::table('fundraisers', function (Blueprint $table) {
            $table->enum('category', ['medical', 'disaster_relief', 'education', 'community', 'emergency'])->default('medical')->after('story');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fundraisers', function (Blueprint $table) {
            $table->dropColumn([
                'beneficiary_relationship',
                'beneficiary_address',
                'organizer_name',
                'organizer_email',
                'organizer_phone',
                'payment_method',
                'account_number',
                'account_name',
                'campaign_duration_days',
                'admin_notes',
                'verified_at',
                'verified_by',
                'terms_agreed',
                'information_accurate',
            ]);
        });
    }
};
