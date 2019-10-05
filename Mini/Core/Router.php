<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class Router
{
    /**
     * @param string $url
     * @return RequestHandler|null
     */
    public abstract function findRequestHandler(string $url);
}