<?php
require "boot.php";
require "src/function.php";
use App\App;

if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == "/callback")
{
    App::run();
}
