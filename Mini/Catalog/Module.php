<?php

namespace Mini\Catalog;

use Mini\Core\BasicModule;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getVersion()
    {
        return 1;
    }

    public function getFrontName()
    {
        return 'catalog';
    }

    public function getRouter()
    {
        return new UrlRewriteRouter();
    }
}