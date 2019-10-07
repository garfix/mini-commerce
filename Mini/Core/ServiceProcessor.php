<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ServiceProcessor
{
    public static function process(string $serviceClass, string $methodName, $input)
    {
        $method = self::getFinalService($serviceClass, $methodName);
        $output = $method($input);
        return $output;
    }

    protected static function getFinalService($baseClass, $methodName)
    {
        $finalServiceMethod = function($input) use ($baseClass, $methodName) {
            return $baseClass::$methodName($input);
        };

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