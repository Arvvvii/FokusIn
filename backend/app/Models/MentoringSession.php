<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentoringSession extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'files' => 'array',
        'agenda_checklist' => 'array',
        'scheduled_at' => 'datetime',
    ];

    /**
     * Relasi ke User sebagai Tutor.
     */
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    /**
     * Relasi ke User sebagai Student (Pelajar).
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
