<?php

namespace Mini\Core\Api;

use Mini\Core\Service;

/**
 * @author Patrick van Bergen
 */
class Logger extends Service
{
    public function log(string $message, string $logFile = "debug")
    {
        $baseDir = __DIR__ . "/../../../log";

        if (!file_exists($baseDir)) {
            mkdir($baseDir);
        }

        $logText = $message . "\n";
        $path = $baseDir . DIRECTORY_SEPARATOR . $logFile;

        file_put_contents($path, $logText, FILE_APPEND);
    }
}