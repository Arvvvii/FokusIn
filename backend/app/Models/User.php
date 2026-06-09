<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; // Tambahkan ini di atas class

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles; // Tambahkan HasRoles di sini

    protected $guarded = ['id'];

    // Relasi ke Post
    public function posts() {
        return $this->hasMany(Post::class);
    }

    // Relasi ke Badge (Many to Many via user_badges)
    public function badges() {
        return $this->belongsToMany(Badge::class, 'user_badges')->withTimestamps();
    }

    // Relasi ke Mentoring (Sebagai Tutor)
    public function sessionsAsTutor() {
        return $this->hasMany(MentoringSession::class, 'tutor_id');
    }

    // Relasi ke Mentoring (Sebagai Pelajar)
    public function sessionsAsStudent() {
        return $this->hasMany(MentoringSession::class, 'student_id');
    }

    public function tutorProfile() {
        return $this->hasOne(TutorProfile::class);
    }

    public function tutorReviews() {
        return $this->hasMany(TutorReview::class, 'tutor_id');
    }

    protected $appends = ['avatar_url'];

    public function getAvatarUrlAttribute()
    {
        return $this->attributes['avatar_url'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}