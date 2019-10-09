<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ServiceResolver
{
    protected $resolvedServices = [];

    public function resolveService(string $serviceClass)
    {
        if (array_key_exists($serviceClass, $this->resolvedServices)) {
            return $this->resolvedServices[$serviceClass];
        } else {
            return $this->getOuterService($serviceClass);
        }
    }

    protected function getOuterService($serviceClass)
    {
        $service = new $serviceClass();

        foreach (Context::getModules() as $module) {
            $wrappers = $module->getServiceWrappers();
            if (array_key_exists($serviceClass, $wrappers)) {
                $serviceWrapper = $wrappers[$serviceClass];
                $service = new $serviceWrapper($service);
            }
        }

        $this->resolvedServices[$serviceClass] = $service;

        return $service;
    }
}