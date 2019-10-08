<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Resolver
{
    protected $models = [];

    public function getModel(string $serviceInterface)
    {
        return $this->getOuterModel($serviceInterface);
    }

    protected function getOuterModel($serviceInterface)
    {
        if (array_key_exists($serviceInterface, $this->models)) {
            return $this->models[$serviceInterface];
        }

        $modelInterface = preg_replace('#\\\\Api\\\\#', '\\Model\\', $serviceInterface) . 'Model';

        $model = new $modelInterface();

        foreach (Context::getModules() as $module) {
            $wrappers = $module->getModelWrappers();
            if (array_key_exists($modelInterface, $wrappers)) {
                $modelWrapper = $wrappers[$modelInterface];
                $model = new $modelWrapper($model);
            }
        }

        $this->models[$serviceInterface] = $model;

        return $model;
    }
}