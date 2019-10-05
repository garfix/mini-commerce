<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class RouterLocater
{
    public function selectRouter(): Router
    {
        foreach (Context::getModules() as $module) {
            if ($router = $module->getRouter()) {
                if ($router->matches(Context::getRequest()->getRequestUri())) {
                    return $router;
                }
            }
        }

        return new Router404();
    }
}