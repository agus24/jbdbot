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
        $httpClient = new CurlHTTPClient('+tShab+/Xdwua1X9VLKEbKkqnVyb20zqeUhH+7YcPQe5n9LqE8d9xO0zKoLcqXG2M6ClqxT12EQh3iHew2nNcer/G2nc4t2To9JrjYKFwQZvLw8R6AiMsYSWCNU5v/lk+wTUAIXi/XecfVt9FjxzyQdB04t89/1O/w1cDnyilFU=');
        $bot = new LINEBot($httpClient, ['channelSecret' => 'c51ade180370b4a509f9029d22c1a5e1']);
        $app->log->info(json_encode($_SERVER));
    }
}
