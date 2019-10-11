<?php

use Mini\Core\BlockResolver;
use Mini\Core\Context;
use Mini\Core\Db;
use Mini\Core\Api\Logger;
use Mini\Core\ModuleUpdater;
use Mini\Core\Request;
use Mini\Core\ServiceResolver;
use Mini\Core\RouteFinder;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../etc/autoload.php';

$moduleNames = require __DIR__ . '/../etc/modules.php';
$environment = require __DIR__ . '/../etc/environment.php';

$modules = [];
foreach ($moduleNames as $moduleName => $active) {
    if ($active) {
        $moduleClass = "\\{$moduleName}\\Module";
        $modules[$moduleName] = new $moduleClass();
    }
}

Context::setCurrentContext(new Context(
    new ServiceResolver($modules),
    new BlockResolver($modules),
    $modules,
    new Request($_SERVER, $_GET, $_POST),
    new Db($environment['db']['dbName'], $environment['db']['dbHost'], $environment['db']['username'], $environment['db']['password']),
    new Logger(__DIR__ . "/../log")
));

$updater = new ModuleUpdater();
//$updater->initialize();
//$updater->update();

