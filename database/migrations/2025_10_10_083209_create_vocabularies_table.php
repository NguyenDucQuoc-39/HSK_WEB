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
        Schema::create('vocabularies', function (Blueprint $table) {
            $table->id();
            $table->string('word');           // chữ Hán
            $table->string('pinyin');         // phiên âm
            $table->string('word_type');      // loại từ (danh, động, tính, ...)
            $table->string('meaning');        // nghĩa tiếng Việt
            $table->foreignId('level_id')->constrained('hsk_levels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocabularies');
    }
};
