<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionOption extends Model
{
     use HasFactory;

    protected $fillable = [
        'question_id',
        'content',
        'image_url',
        'is_correct',
        'label',
    ];

    /**
     * Một lựa chọn thuộc về một câu hỏi.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
