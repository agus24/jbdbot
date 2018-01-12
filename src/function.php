<?php

if(!function_exists("dd")) {
  function dd($var) {
    die(dump($var));
  }
}
