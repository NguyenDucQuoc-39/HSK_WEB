<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use HasFactory;

    protected $fillable = [
        'word', 'pinyin', 'word_type', 'meaning', 'level_id',
    ];

    public function level()
    {
        return $this->belongsTo(HskLevel::class, 'level_id');
    }

    public function examples()
    {
        return $this->hasMany(VocabularyExample::class);
    }
}
