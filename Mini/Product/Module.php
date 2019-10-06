<?php

namespace Mini\Product;

use Mini\Core\BasicModule;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getFrontName()
    {
        return 'product';
    }

    public function getRouter()
    {
        return new UrlRewriteRouter();
    }
}