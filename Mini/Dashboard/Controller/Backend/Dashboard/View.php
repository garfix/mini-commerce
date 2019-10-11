<?php

namespace Mini\Dashboard\Controller\Backend\Dashboard;

use Mini\Core\Api\PageBuilder;
use Mini\Backend\Block\BackendShell;
use Mini\Core\RequestHandler;
use Mini\Core\Response;
use Mini\Dashboard\Block\Backend\Dashboard as DashboardBlock;

/**
 * @author Patrick van Bergen
 */
class View extends RequestHandler
{
    public function createResponse(): Response
    {
        return new Response([], PageBuilder::resolve()->buildPage(BackendShell::resolve(), DashboardBlock::resolve()));
    }
}