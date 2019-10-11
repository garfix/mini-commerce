<?php

use Mini\Backend\Api\BackendRouter;
use Mini\Core\Context;

require_once __DIR__ . "/common.php";

$page = 'dashboard/dashboard/view';
$get = Context::getRequest()->getGet();
if (!empty($get['page'])) {
    $page = $get['page'];
}

$router = new BackendRouter();
$requestHandler = $router->findRequestHandler($page);
$response = $requestHandler->createResponse();

foreach ($response->getHeaders() as $header) {
    header($header);
}

echo $response->getBody();

Context::setCurrentContext(null);
