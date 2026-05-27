<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiSummary extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'summary_json' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
