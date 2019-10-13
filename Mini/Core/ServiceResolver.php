<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ServiceResolver
{
    /** @var string[][] */
    protected $decorators = [];

    /** @var Service[] */
    protected $resolvedServices = [];

    /**
     * ServiceResolver constructor.
     * @param Module[] $modules
     */
    public function __construct(array $modules)
    {
        foreach ($modules as $module) {
            foreach ($module->getServiceDecorators() as $original => $decorator) {
                $this->decorators[$original][] = $decorator;
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

        if (array_key_exists($serviceClass, $this->decorators)) {
            foreach ($this->decorators[$serviceClass] as $decorator) {
                $service = new $decorator($service);
            }
        }

        $this->resolvedServices[$serviceClass] = $service;

        return $service;
    }
}