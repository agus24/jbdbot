<?php

namespace App;

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use Log\Log;

class App
{
    public $log;

    public function __construct()
    {
        $this->log = Log::instance();
    }

    public static function init() {
        return new static;
    }

    public static function run()
    {
        $app = new static;
        $log = Log::instance();
        $httpClient = new CurlHTTPClient('1556985519');
        $bot = new LINEBot($httpClient, ['channelSecret' => 'c51ade180370b4a509f9029d22c1a5e1']);
        $app->log->info(json_encode($_SERVER));
    }
}
