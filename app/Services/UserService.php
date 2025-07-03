<?php

namespace App\Services;

use App\Factories\UserFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userFactory;
    /**
     * Create a new class instance.
     */
    public function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    /**
     * Function: createAndSaveUser
     * @param array request
     * @return 
     */
    public function createAndSaveUser($request) {
        # Create User Model Instance/Object
        $user = $this->userFactory->createUser($request);

        $user->phone_number = $request['phoneNumber'];
        $user->password = Hash::make($request['password']);
        return $user->save();
    }

    /**
     * Function: fetchUsers
     * @param NA
     * @return
     */

     public function fetchUsers() {
        return User::all();
     }
}
