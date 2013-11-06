<?php

function load($class) {
    $class = str_replace('\\','/' , $class);
    $file = __DIR__ . '/' . $class . '.php';
    require_once $file;
}

spl_autoload_register('load');
