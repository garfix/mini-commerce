<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Resolver
{
    static protected $models = [];

    public static function getModel(string $serviceInterface)
    {
        return self::getOuterModel($serviceInterface);
    }

    protected static function getOuterModel($serviceInterface)
    {
        if (array_key_exists($serviceInterface, self::$models)) {
            return self::$models[$serviceInterface];
        }

        $modelInterface = preg_replace('#\\\\Api\\\\#', '\\Model\\', $serviceInterface) . 'Model';

        $model = new $modelInterface();

        foreach (Context::getModules() as $module) {
            foreach ($module->getModelWrappers() as $baseModel => $modelWrapper) {
                if ($baseModel === $modelInterface) {
                    $model = new $modelWrapper($model);
                }
            }
        }

        self::$models[$serviceInterface] = $model;

        return $model;
    }
}