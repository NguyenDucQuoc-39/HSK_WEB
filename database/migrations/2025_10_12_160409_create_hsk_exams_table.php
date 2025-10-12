<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Bảng chứa các đề thi HSK
    public function up(): void {
    Schema::create('hsk_exams', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Ví dụ: Đề Thi HSK 1 - Mã #001
        $table->foreignId('hsk_level_id')->constrained('hsk_levels');
        $table->integer('duration_minutes')->default(40);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hsk_exams');
    }
};
