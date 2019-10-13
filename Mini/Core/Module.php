<?php

namespace Mini\Core;

use Mini\Frontend\Api\FrontendRouter;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getFrontName()
    {
        return 'core';
    }

    /**
     * @return Router|null
     */
    public function getRouter()
    {
        return new FrontendRouter();
    }
}