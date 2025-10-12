<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
     use HasFactory;

    protected $fillable = [
        'exam_section_id',
        'order',
        'type',
        'content',
        'audio_url',
        'image_url',
        'correct_answer',
    ];

    /**
     * Một câu hỏi thuộc về một phần thi.
     */
    public function section()
    {
        return $this->belongsTo(ExamSection::class, 'exam_section_id');
    }

    /**
     * Một câu hỏi có nhiều lựa chọn (A, B, C...).
     */
    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }
}
