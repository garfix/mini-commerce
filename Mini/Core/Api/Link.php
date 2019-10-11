<?php

namespace Mini\Core\Api;

use Mini\Core\Context;
use Mini\Core\Service;

/**
 * @author Patrick van Bergen
 */
class Link extends Service
{
    public function create($relativeUrl)
    {
        return Context::getRequest()->getBaseUri() . "?" . $relativeUrl;
    }
}