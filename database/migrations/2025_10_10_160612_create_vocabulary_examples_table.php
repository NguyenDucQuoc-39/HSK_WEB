<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_vocabulary_examples_table.php

    public function up(): void
    {
        Schema::create('vocabulary_examples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vocabulary_id')->constrained()->onDelete('cascade');
            $table->text('sentence');      // Ví dụ bằng chữ Hán
            $table->text('pinyin')->nullable();       // Pinyin của ví dụ
            $table->text('meaning');       // Nghĩa tiếng Việt của ví dụ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocabulary_examples');
    }
};
