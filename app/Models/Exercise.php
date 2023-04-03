<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercise_type',
        'repetitions',
        'youtube_link',
        'user_id',
        'approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
