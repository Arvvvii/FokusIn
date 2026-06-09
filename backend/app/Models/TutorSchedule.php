<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorSchedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_available' => 'boolean',
    ];

    /**
     * Relasi ke User (Tutor pemilik jadwal).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
