<?php

namespace App\Http\Controllers;

use App\Singletons\Logger;
use Illuminate\Http\Request;

class AnotherController extends Controller
{
    public function dumpLogFromSecondController($message) {
        // $log = new Logger;
        $logger = Logger::getInstance();
        $logger->dumpLog($message);
    }
}
