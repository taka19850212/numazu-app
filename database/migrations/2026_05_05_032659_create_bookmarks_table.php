<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            // 誰がお気に入りしたか（usersテーブルと紐付け）
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // どのスポットをお気に入りしたか（spotsテーブルと紐付け）
            $table->foreignId('spot_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            // 同じ人が同じスポットを2回以上お気に入りできないように安全装置をかける
            $table->unique(['user_id', 'spot_id']);
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
