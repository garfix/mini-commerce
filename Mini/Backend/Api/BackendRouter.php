<?php

namespace Mini\Backend\Api;

use Mini\Core\Router;
use Mini\Dashboard\Controller\View;

/**
 * @author Patrick van Bergen
 */
class BackendRouter extends Router
{
    public function findRequestHandler(string $url)
    {
        if (preg_match('#^/([^/]+)/([^/]+)/([^/]+)$#', $url, $matches)) {
            $frontName = $matches[1];
            $entity = $matches[2];
            $action = $matches[3];

            foreach (Context::getModules() as $module) {
                if ($module->getFrontName() === $frontName) {
                    $handlerClass = $module->completeClassname('Controller\\Backend\\' . ucfirst($entity) . '\\' . ucfirst($action));
                    if (!class_exists($handlerClass)) {
                        Context::getLogger()->log("Router: class not found: " . $handlerClass);
                    } else {
                        return new $handlerClass();
                    }
                }
            }

        }

        return new View();
    }
}