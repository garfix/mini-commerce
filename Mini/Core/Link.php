<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Link extends Service
{
    public function create($relativeUrl)
    {
        return Context::getRequest()->getRequestUri() . "?" . $relativeUrl;
    }
}