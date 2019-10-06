<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class BasicModule
{
    public function getVersion()
    {
        return null;
    }

    public abstract function getFrontName();

    /**
     * @return Router|null
     */
    public function getRouter()
    {
        return null;
    }

    public function completeClassname(string $relativeClassname)
    {
        return preg_replace('#Module$#', $relativeClassname, get_class($this));
    }

    /**
     * @return []string
     */
    public function getBlockWrappers(): array
    {
        return [];
    }
}