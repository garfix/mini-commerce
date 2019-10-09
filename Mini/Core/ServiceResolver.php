<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ServiceResolver
{
    /** @var string[][] */
    protected $wrappers = [];

    /** @var Service[] */
    protected $resolvedServices = [];

    /**
     * ServiceResolver constructor.
     * @param Module[] $modules
     */
    public function __construct(array $modules)
    {
        foreach ($modules as $module) {
            foreach ($module->getServiceWrappers() as $original => $wrapper) {
                $this->wrappers[$original][] = $wrapper;
            }
        }
    }

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

        if (array_key_exists($serviceClass, $this->wrappers)) {
            foreach ($this->wrappers[$serviceClass] as $wrapper) {
                $service = new $wrapper($service);
            }
        }

        $this->resolvedServices[$serviceClass] = $service;

        return $service;
    }
}