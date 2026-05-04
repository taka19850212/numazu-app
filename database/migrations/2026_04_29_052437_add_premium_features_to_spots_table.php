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
        Schema::table('spots', function (Blueprint $table) {
            $table->boolean('is_haral_friendly')->default(false);
            $table->boolean('is_private_booking')->default(false);
            $table->boolean('is_english_friendly')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spots', function (Blueprint $table) {
            $table->dropColumn(['is_halal_friendly', 'is_private_booking', 'is_english_friendly']);
        });
    }
};
