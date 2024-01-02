<?php

namespace App\Policies;

use App\Models\User;

class CatPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //

    }

    function update(User $user){
        return $user->can("is-admin");
    }

}
