<?php

namespace Mini\Catalog;

use Mini\Core\RequestHandler;
use Mini\Core\Router;
use Mini\Catalog\Controller\Frontend\Product\View;

/**
 * @author Patrick van Bergen
 */
class UrlRewriteRouter extends Router
{
    /**
     * @param string $url
     * @return RequestHandler|null
     */
    public function findRequestHandler(string $url)
    {
        if ($url === "/blue-jeans") {
            return new View();
        }

        return null;
    }
}