<?php

require_once __DIR__ . "/../vendor/autoload.php";

spl_autoload_register(function($class) {

    if (preg_match('#\\\\?Mini\\\\(.*)#', $class, $matches)) {
        $path = __DIR__ . "/../" . str_replace('\\', '/', $matches[1]) . '.php';

        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }

    $path = __DIR__ . '/../code/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($path)) {
        require_once $path;
        return;
    }
});