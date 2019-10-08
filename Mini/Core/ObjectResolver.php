<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ObjectResolver
{
    protected $objects = [];

    public function resolveObject(string $className)
    {
        if (array_key_exists($className, $this->objects)) {
            return $this->objects[$className];
        } else {
            return $this->getOuterObject($className);
        }
    }

    protected function getOuterObject($className)
    {
        $object = new $className();

        foreach (Context::getModules() as $module) {
            $wrappers = $module->getObjectWrappers();
            if (array_key_exists($className, $wrappers)) {
                $objectWrapper = $wrappers[$className];
                $object = new $objectWrapper($object);
            }
        }

        $this->objects[$className] = $object;

        return $object;
    }
}