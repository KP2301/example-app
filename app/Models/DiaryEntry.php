<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryEntry extends Model
{
    use HasFactory;
        protected $table = 'diary_entries';
        protected $fillable = ['user_id', 'date', 'content'];
        protected $casts = [
        'date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function emotions()
    {
        return $this->belongsToMany(Emotion::class, 'diary_entry_emotions','diary_entry_id', 'emotion_id')->withPivot('intensity')->withTimestamps();
    }
    
    
}
