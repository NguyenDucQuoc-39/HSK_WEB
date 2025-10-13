<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Bảng chứa các phần của đề thi HSK Nghe và Đọc
    public function up(): void {
    Schema::create('exam_sections', function (Blueprint $table) {
        $table->id();
        $table->foreignId('hsk_exam_id')->constrained()->onDelete('cascade');
        $table->string('title'); // Ví dụ: I. Nghe (听力)
        $table->enum('type', ['listening', 'reading']);
        $table->integer('order')->default(1);
        $table->text('instruction')->nullable(); // Hướng dẫn làm bài cho phần này
        // Thêm cột mới kiểu JSON để lưu "ngân hàng" đáp án
        $table->json('instruction_options')->nullable(); // Lưu trữ các tùy chọn hướng dẫn làm bài
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_sections');
    }
};
