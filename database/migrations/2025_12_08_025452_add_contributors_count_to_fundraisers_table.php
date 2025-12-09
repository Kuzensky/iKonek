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
            $table->integer('contributors_count')->default(0)->after('current_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fundraisers', function (Blueprint $table) {
            $table->dropColumn('contributors_count');
        });
    }
};
