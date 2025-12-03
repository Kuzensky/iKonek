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
        Schema::create('fundraiser_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fundraiser_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->enum('payment_method', ['cash', 'gcash', 'paymaya', 'bank_transfer', 'other'])->default('cash');
            $table->string('reference_number', 100)->nullable();
            $table->string('payment_proof', 500)->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();

            $table->index('fundraiser_id');
            $table->index('user_id');
            $table->index('status');
            $table->index(['fundraiser_id', 'status']);
            $table->index(['user_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundraiser_contributions');
    }
};
