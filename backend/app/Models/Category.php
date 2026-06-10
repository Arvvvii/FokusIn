<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function quizSets()
    {
        return $this->hasMany(QuizSet::class);
    }

    public function examUploads()
    {
        return $this->hasMany(ExamUpload::class);
    }
}
