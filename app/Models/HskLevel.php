<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vocabulary;
use App\Models\VocabularyExample;
use App\Models\HskExam;

class HskLevel extends Model
{
    //
    public function vocabularies()
    {
        return $this->hasMany(Vocabulary::class, 'level_id');
    }

    /**
     * Lấy tất cả ví dụ trong một level thông qua các từ vựng.
     */
    public function examples()
    {
        return $this->hasManyThrough(VocabularyExample::class, Vocabulary::class, 'level_id', 'vocabulary_id');
    }

    public function exams()
    {
        return $this->hasMany(HskExam::class, 'hsk_level_id');
    }
}
