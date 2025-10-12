<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HskExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'hsk_level_id',
        'duration_minutes',
    ];

    /**
     * Một đề thi thuộc về một cấp độ HSK.
     */
    public function level()
    {
        return $this->belongsTo(HskLevel::class, 'hsk_level_id');
    }

    /**
     * Một đề thi có nhiều phần thi (Nghe, Đọc, Viết).
     */
    public function sections()
    {
        return $this->hasMany(ExamSection::class);
    }
}
