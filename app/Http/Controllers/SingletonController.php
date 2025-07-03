<?php

namespace App\Http\Controllers;

use App\Singletons\Logger;
use Illuminate\Http\Request;

class SingletonController extends Controller
{
    // protected $logger;

    // public function __construct(Logger $logger) {
    //     $this->logger = $logger;
    // }

    public function singletonExample() {

        $log = Logger::getInstance();

        // $clonedLogObj = clone $log;

        // $serizaliedObj = serialize($log);

        // dd($log, unserialize($serizaliedObj));

        // $logger = new Logger();
        $log->dumpLog('Singleton Log Message - Instance 1');

        // $loggerTwo = new Logger;
        $log->dumpLog('Singleton Log Message - Instance 2');

        // $loggerThree = new Logger;
        $log->dumpLog('Singleton Log Message - Instance 3');

        $anotherController = new AnotherController;

        $anotherController->dumpLogFromSecondController('Message from Another Controller');

        return 'Log has been dumped';
    }
}
