<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Resolver
{
    protected $models = [];

    public function getModel(string $interface)
    {
        return $this->getOuterModel($interface);
    }

    protected function getOuterModel($modelInterface)
    {
        if (array_key_exists($modelInterface, $this->models)) {
            return $this->models[$modelInterface];
        }

        $model = new $modelInterface();

        foreach (Context::getModules() as $module) {
            $wrappers = $module->getModelWrappers();
            if (array_key_exists($modelInterface, $wrappers)) {
                $modelWrapper = $wrappers[$modelInterface];
                $model = new $modelWrapper($model);
            }
        }

        $this->models[$modelInterface] = $model;

        return $model;
    }
}