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
        Schema::create('fundraisers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('story')->nullable();
            $table->enum('category', ['medical', 'disaster_relief', 'education', 'community', 'other'])->default('other');
            $table->decimal('goal_amount', 10, 2);
            $table->decimal('current_amount', 10, 2)->default(0);
            $table->string('beneficiary_name');
            $table->string('beneficiary_contact', 20)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['draft', 'pending_review', 'active', 'completed', 'cancelled'])->default('draft');
            $table->string('featured_image', 500)->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('status');
            $table->index('category');
            $table->index(['status', 'end_date']);
            $table->index('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundraisers');
    }
};
