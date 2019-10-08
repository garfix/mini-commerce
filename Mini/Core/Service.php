<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class Service
{
    /**
     * @return object|$this
     */
    public static function resolve()
    {
        return Context::resolve(get_called_class());
    }
}