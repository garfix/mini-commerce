<?php

namespace Mini\Dashboard\Controller\Backend;

use Mini\Core\PageBuilder;
use Mini\Backend\Block\BackendShell;
use Mini\Core\RequestHandler;
use Mini\Core\Response;
use Mini\Dashboard\Block\Backend\Dashboard;

/**
 * @author Patrick van Bergen
 */
class View extends RequestHandler
{

    public function createResponse(): Response
    {
        return new Response([], PageBuilder::resolve()->buildPage(new BackendShell(Dashboard::resolve())));
    }
}