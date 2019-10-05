<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Router404 extends Router
{
    public function matches(string $url): bool
    {
        return true;
    }

    public function getRequestHandler(): RequestHandler
    {
        return new RequestHandler404();
    }
}