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
     * Thêm thuộc tính này vào model.
     * Nó sẽ tự động chuyển đổi cột 'instruction_options' từ JSON string sang array.
     */
    protected $casts = [
        'instruction_options' => 'array',
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
