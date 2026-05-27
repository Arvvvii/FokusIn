<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Tentukan apakah user dapat melihat profil user target.
     */
    public function view(User $user, User $targetUser): bool
    {
        // User hanya bisa melihat profilnya sendiri ATAU jika user adalah admin
        return $user->id === $targetUser->id || $user->hasRole('admin');
    }
}
