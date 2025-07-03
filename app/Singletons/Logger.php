<?php

namespace App\Singletons;

use Exception;
use Illuminate\Support\Facades\Log;

class Logger
{
    private static $instance = null;

    private function __construct()
    {
        
    }

    private function __clone()
    {
        throw new Exception('Clone ont allowed');
    }
    
    public function __wakeup()
    {
        throw new Exception('Serialization not allowed');
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function dumpLog($message) {
        $objectId = spl_object_id($this);
        Log::info("$message Object Id : {$objectId}");
    }
}
