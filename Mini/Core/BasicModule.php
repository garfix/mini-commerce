<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class BasicModule
{
    /**
     * @return Router|null
     */
    public function getRouter()
    {
        return null;
    }
}