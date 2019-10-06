<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getVersion()
    {
        return 2;
    }

    public function getFrontName()
    {
        return 'core';
    }

    /**
     * @return Router|null
     */
    public function getRouter()
    {
        return new ModuleRouter();
    }
}