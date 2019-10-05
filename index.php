<?php

use Mini\Core\RequestBuilder;
use Mini\Core\RequestHandlerBuilder;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/etc/autoload.php';

$modules = require __DIR__ . '/etc/modules.php';

$requestBuilder = new RequestBuilder();
$request = $requestBuilder->buildRequest();

$requestHandlerBuilder = new RequestHandlerBuilder();
$requestHandler = $requestHandlerBuilder->buildRequestHandler($request);

new \SomeCompany\SomeModule\Page\ProductPage();