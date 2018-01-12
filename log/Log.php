<?php

namespace Log;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    private $log;
    public function __construct()
    {
        $this->log = new Logger('name');
        $this->log->pushHandler(new StreamHandler('log/log.txt', Logger::DEBUG));
    }

    public static function instance()
    {
      return new static;
    }

    public function info($text)
    {
      $this->log->info($text);
    }

    public function warning($text)
    {
      $this->log->warning($text);
    }

    public function error($text)
    {
      $this->log->error($text);
    }
}

?>
