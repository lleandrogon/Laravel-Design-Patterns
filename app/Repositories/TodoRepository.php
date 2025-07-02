<?php

namespace App\Repositories;

use App\Interfaces\TodoInterface;
use App\Models\Todo;

class TodoRepository implements TodoInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getTodos() {
        return Todo::all();
    }
    
    public function saveTodo($todoRequest) {
        return Todo::create($todoRequest);
    }
}
