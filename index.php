<?php
require "boot.php";

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;

$httpClient = new CurlHTTPClient('1556985519');
$bot = new LINEBot($httpClient, ['channelSecret' => 'c51ade180370b4a509f9029d22c1a5e1']);
