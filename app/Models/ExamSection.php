<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'hsk_exam_id',
        'title',
        'type',
        'order',
        'instruction',
    ];

    /**
     * Một phần thi thuộc về một đề thi.
     */
    public function exam()
    {
        return $this->belongsTo(HskExam::class, 'hsk_exam_id');
    }

    /**
     * Một phần thi có nhiều câu hỏi.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
