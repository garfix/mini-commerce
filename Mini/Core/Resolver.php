<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Resolver
{
    protected $models = [];

    public function getModel(string $className)
    {
        return $this->getOuterModel($className);
    }

    protected function getOuterModel($className)
    {
        if (array_key_exists($className, $this->models)) {
            return $this->models[$className];
        }

        $object = new $className();

        foreach (Context::getModules() as $module) {
            $wrappers = $module->getModelWrappers();
            if (array_key_exists($className, $wrappers)) {
                $objectWrapper = $wrappers[$className];
                $object = new $objectWrapper($object);
            }
        }

        $this->models[$className] = $object;

        return $object;
    }
}