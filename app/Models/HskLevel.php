<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
