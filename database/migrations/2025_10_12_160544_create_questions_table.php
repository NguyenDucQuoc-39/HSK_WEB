<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //  (Bảng chứa câu hỏi - thiết kế linh hoạt)
    public function up(): void {
    Schema::create('questions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('exam_section_id')->constrained()->onDelete('cascade');
        $table->integer('order'); // Số thứ tự câu hỏi
        
        // Enum để xác định loại câu hỏi, giúp render giao diện chính xác
        $table->enum('type', [
            'listening_image_true_false', // Nghe – chọn Đúng/Sai theo hình
            'listening_image_choice',     // Nghe – chọn hình đúng
            'listening_dialogue_choice',  // Nghe hội thoại – chọn đáp án đúng
            'reading_image_choice',       // Câu – chọn hình đúng
            'reading_match_pair',         // Ghép câu hỏi và câu trả lời
            'reading_fill_in_blank',      // Điền từ vào chỗ trống
        ]);

        $table->text('content')->nullable();      // Nội dung câu hỏi (chữ, đoạn văn)
        $table->string('audio_url')->nullable();  // URL file audio từ Cloudinary
        $table->string('image_url')->nullable();  // URL file ảnh từ Cloudinary
        $table->string('correct_answer')->nullable(); // Đáp án cho câu điền từ hoặc ghép nối
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
