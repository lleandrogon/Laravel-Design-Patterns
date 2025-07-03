<?php

namespace App\Factories;

use App\Models\User;

class UserFactory
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Function: createUser
     * @param array userRequest
     * @return App\Models\User
     */
    public function createUser($userRequest): User {
        return new User($userRequest);
    }
}
