<?php

namespace App\Http\Controllers;

use App\Services\RoleGreetingService;
use Illuminate\Http\Request;

class GreetingController extends Controller
{
    private $roleGreeting;

    public function __construct(RoleGreetingService $roleGreeting) {
        $this->roleGreeting = $roleGreeting;
    }

    public function showGreetings($role) {
        return $this->roleGreeting->getGreeting($role);

        # admin | editor | publisher | default

        /*
        if ($role === 'admin') {
            return 'Hey Admin! you have full access.';
        } else if ($role === 'editor') {
            return 'Hey Editor! you have edit access.';
        } else if ($role === 'publisher') {
            return 'Hey Publisher! you have published access.';
        } else {
            return 'Hey User! you have view access.';
        }
        */
    }
}
