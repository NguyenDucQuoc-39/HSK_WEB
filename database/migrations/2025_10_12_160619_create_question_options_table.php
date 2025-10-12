<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Bảng chứa các lựa chọn cho câu hỏi (áp dụng cho các loại câu hỏi có đáp án lựa chọn)
    public function up(): void
    {
        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->text('content')->nullable();      // Nội dung lựa chọn (dạng chữ)
            $table->string('image_url')->nullable();  // Nội dung lựa chọn (dạng ảnh)
            $table->boolean('is_correct')->default(false);
            $table->char('label', 1)->nullable();     // Nhãn A, B, C...
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_options');
    }
};
