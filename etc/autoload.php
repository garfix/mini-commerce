<?php

spl_autoload_register(function($class) {

    if (preg_match('#\\\\?Mini\\\\(.*)#', $class, $matches)) {
        $path = __DIR__ . "/../" . str_replace('\\', '/', $class) . '.php';

        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }

    $path = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($path)) {
        require_once $path;
        return;
    }
});

require_once __DIR__ . "/../vendor/autoload.php";
