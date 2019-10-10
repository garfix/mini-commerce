<?php

use Mini\Core\Context;
use Mini\Core\RouteFinder;

require_once __DIR__ . "/../private/common.php";

$requestHandler = RouteFinder::resolve()->findRequestHandler();
$response = $requestHandler->createResponse();

foreach ($response->getHeaders() as $header) {
    header($header);
}

echo $response->getBody();

Context::getLogger()->log(date('Y-m-d H:i:s'));

Context::setCurrentContext(null);

