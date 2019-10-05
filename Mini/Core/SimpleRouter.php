<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class SimpleRouter extends Router
{
    public function matches(string $url): bool
    {
        return preg_match('#/[^/]+/[^/]+/[^/]+#', $url);
    }

    public function getRequestHandler(): RequestHandler
    {
        // TODO: Implement execute() method.
        die('x');
    }
}