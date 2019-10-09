<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class RouteFinder extends Service
{
    public function findRequestHandler(): RequestHandler
    {
        foreach (Context::getModules() as $module) {
            if ($router = $module->getRouter()) {
                if ($requestHandler = $router->findRequestHandler(Context::getRequest()->getRequestUri())) {
                    return $requestHandler;
                }
            }
        }

        return new RequestHandler404();
    }
}