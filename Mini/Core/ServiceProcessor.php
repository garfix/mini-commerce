<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ServiceProcessor
{
    public static function process(string $serviceClass, string $methodName)
    {
        $method = self::getOuterMethod($serviceClass, $methodName);
        return $method;
    }

    protected static function getOuterMethod($baseClass, $methodName)
    {
        $finalServiceMethod = [$baseClass, $methodName];

        foreach (Context::getModules() as $module) {
            foreach ($module->getServiceWrappers() as $base => $override) {
                if ($base === $baseClass) {
                    $innerMethod = $finalServiceMethod;
                    $finalServiceMethod = function($input) use ($override, $methodName, $innerMethod) {
                        return $override::$methodName($innerMethod, $input);
                    };
                }
            }
        }

        return $finalServiceMethod;
    }
}