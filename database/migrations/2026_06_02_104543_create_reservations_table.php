<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            // どのスポットに対する予約か（spotsテーブルと紐付け）
            $table->foreignId('spot_id')->constrained()->cascadeOnDelete();
            // 予約希望日
            $table->date('date');
            $table->string('email');
            // 参加人数（pax）
            $table->integer('pax');
            // ご要望・メッセージ
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
