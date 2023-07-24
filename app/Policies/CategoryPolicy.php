<?php

namespace App\Policies;

use App\Models\Category;

class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function authorizeCategory(): bool
    {
        return auth()->user()->isAdmin() == true;
    }
}
