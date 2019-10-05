<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Logger
{
    /** @var string */
    protected $baseDir;

    public function __construct(string $baseDir)
    {
        $this->baseDir = $baseDir;
    }

    public function log(string $message, string $logFile = "debug")
    {
        if (!file_exists($this->baseDir)) {
            mkdir($this->baseDir);
        }

        $logText = $message . "\n";
        $path = $this->baseDir . DIRECTORY_SEPARATOR . $logFile;

        file_put_contents($path, $logText, FILE_APPEND);
    }
}