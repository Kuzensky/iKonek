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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', [
                'appointment_reminder',
                'donation_thank_you',
                'campaign_update',
                'contribution_verified',
                'system_announcement'
            ]);
            $table->string('title');
            $table->text('message');
            $table->string('related_type', 100)->nullable();
            $table->unsignedBigInteger('related_id')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('is_read');
            $table->index(['user_id', 'is_read', 'created_at']);
            $table->index('related_type');
            $table->index(['related_type', 'related_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
