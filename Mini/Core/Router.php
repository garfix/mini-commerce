<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class Router
{
    public abstract function matches(string $url): bool;

    public abstract function getRequestHandler(): RequestHandler;
}