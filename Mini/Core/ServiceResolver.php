<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ServiceResolver
{
    protected $wrappers = [];

    protected $resolvedServices = [];

    public function __construct(array $modules)
    {
        foreach ($modules as $module) {
            foreach ($module->getServiceWrappers() as $original => $wrapper) {
                if (!array_key_exists($original, $this->wrappers)) {
                    $this->wrappers[$original] = [];
                }
                $this->wrappers[$original][] = $wrapper;
            }
        }
    }

    public function resolveService(string $serviceClass)
    {
        if (!array_key_exists($serviceClass, $this->wrappers)) {
            return new $serviceClass();
        } else if (array_key_exists($serviceClass, $this->resolvedServices)) {
            return $this->resolvedServices[$serviceClass];
        } else {
            return $this->getOuterService($serviceClass);
        }
    }

    protected function getOuterService($serviceClass)
    {
        $service = new $serviceClass();

        foreach ($this->wrappers[$serviceClass] as $wrapper) {
            $service = new $wrapper($service);
        }

        $this->resolvedServices[$serviceClass] = $service;

        return $service;
    }
}