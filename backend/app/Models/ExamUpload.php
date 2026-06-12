<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamUpload extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'ai_analysis' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function quizSet()
    {
        return $this->belongsTo(QuizSet::class);
    }
}
