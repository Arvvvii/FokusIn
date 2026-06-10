<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Relasi ke user yang melaporkan.
     */
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    /**
     * Relasi polimorfik manual ke entitas yang dilaporkan.
     * (Pakai pendekatan manual karena reported_type hanya 'post' atau 'user')
     */
    public function reportedPost()
    {
        return $this->belongsTo(Post::class, 'reported_id');
    }

    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'reported_id');
    }
}
