<?php

use Mini\Core\Context;
use Mini\Core\Db;
use Mini\Core\Logger;
use Mini\Core\RequestBuilder;
use Mini\Core\RequestHandlerBuilder;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/etc/autoload.php';

$modules = require __DIR__ . '/etc/modules.php';
$environment = require __DIR__ . '/etc/environment.php';

$requestBuilder = new RequestBuilder();

Context::setCurrentContext(new Context(
    $requestBuilder->buildRequest(),
    new Db($environment['db']['dbName'], $environment['db']['dbHost'], $environment['db']['username'], $environment['db']['password']),
    new Logger(__DIR__ . "/log")
));

$requestHandlerBuilder = new RequestHandlerBuilder();
$requestHandler = $requestHandlerBuilder->buildRequestHandler(Context::getRequest());

$response = $requestHandler->execute();

foreach ($response->getHeaders() as $header) {
    header($header);
}

echo $response->getBody();

new \SomeCompany\SomeModule\Page\ProductPage();

Context::getLogger()->log(date('Y-m-d H:i:s'));

Context::setCurrentContext(null);