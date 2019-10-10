<?php

use Mini\Backend\Api\BackendRouter;
use Mini\Core\Context;

require_once __DIR__ . "/common.php";

$router = new BackendRouter();
$requestHandler = $router->findRequestHandler(Context::getRequest()->getRequestUri());
$response = $requestHandler->createResponse();

foreach ($response->getHeaders() as $header) {
    header($header);
}

echo $response->getBody();

Context::setCurrentContext(null);
