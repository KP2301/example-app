<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    use HasFactory;
    protected $table = 'emotions';
    protected $fillable = ['name', 'description'];
    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];

    public function diaryEntries()
    {
        return $this->belongsToMany(DiaryEntry::class, 'diary_entry_emotions')->withPivot('intensity')->withTimestamps();
    }

    
}
