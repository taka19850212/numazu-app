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
        Schema::create('spots', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // スポットの名前（例：我入道の渡し）
            $table->text('description')->nullable(); // スポットの説明文
            $table->string('image_path')->nullable(); // 画像の保存場所
            $table->string('address')->nullable(); // 住所や場所のヒント
            $table->boolean('is_halal_friendly')->default(false);
            $table->boolean('is_private_booking')->default(false);
            $table->boolean('is_english_friendly')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spots');
    }
};
