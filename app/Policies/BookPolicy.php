<?php

namespace App\Policies;

use App\Models\{User, Book};

class BookPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function authorizeBook(User $user, Book $book): bool
    {
        return $user->id === $book->user->id;
    }
}
