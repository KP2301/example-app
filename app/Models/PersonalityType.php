<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalityType extends Model
{
    use HasFactory;
    protected $table = 'personality_types';
    protected $fillable = [
        'type',
        'description',
    ];
    protected $casts = [
        'create_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'type_id');
    }
}
