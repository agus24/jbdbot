<?php
require "boot.php";
require "src/function.php";

use App\App;

if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == "/callback")
{
    $app = new App("+tShab+/Xdwua1X9VLKEbKkqnVyb20zqeUhH+7YcPQe5n9LqE8d9xO0zKoLcqXG2M6ClqxT12EQh3iHew2nNcer/G2nc4t2To9JrjYKFwQZvLw8R6AiMsYSWCNU5v/lk+wTUAIXi/XecfVt9FjxzyQdB04t89/1O/w1cDnyilFU=",
        "c51ade180370b4a509f9029d22c1a5e1");
    $app->run();
}
