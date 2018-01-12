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
        $app->log->info('a');
        $app->pushMessage("woi");
    }

    private function exec_url($fullurl,$channelAccessToken,$message)
    {

        $header = array(
            "Content-Type: application/json",
            'Authorization: Bearer '.$channelAccessToken,
        );


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST,           1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS,     $message);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $fullurl);

        $returned =  curl_exec($ch);

        return($returned);
    }

    public function pushMessage($message)
    {
        $response = exec_url('https://api.line.me/v2/bot/message/push',$this->channelAccessToken,json_encode($message));
    }
}
