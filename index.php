<?php
require "boot.php";

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;

$httpClient = new CurlHTTPClient('1556985519');
$bot = new LINEBot($httpClient, ['channelSecret' => 'c51ade180370b4a509f9029d22c1a5e1']);

$response = $bot->replyText('+tShab+/Xdwua1X9VLKEbKkqnVyb20zqeUhH+7YcPQe5n9LqE8d9xO0zKoLcqXG2M6ClqxT12EQh3iHew2nNcer/G2nc4t2To9JrjYKFwQZvLw8R6AiMsYSWCNU5v/lk+wTUAIXi/XecfVt9FjxzyQdB04t89/1O/w1cDnyilFU=', 'hello!');
