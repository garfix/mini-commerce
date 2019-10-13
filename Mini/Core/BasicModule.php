<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class BasicModule
{
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
    public function getBlockDecorators(): array
    {
        return [];
    }

    /**
     * @return []string
     */
    public function getServiceDecorators(): array
    {
        return [];
    }
}