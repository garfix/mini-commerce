<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ServiceProcessor
{
    public static function process(string $serviceClass, $input)
    {
        $class = self::getFinalService($serviceClass);
        $output = $class->execute($input);
        return $output;
    }

    protected static function getFinalService($baseClass)
    {
        $finalService = new $baseClass();

        foreach (Context::getModules() as $module) {
            foreach ($module->getServiceWrappers() as $base => $override) {
                if ($base === $baseClass) {
                    $finalService = new $override($finalService);
                }
            }
        }

        return $finalService;
    }
}