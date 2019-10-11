<?php

namespace Mini\Catalog\Controller\Backend\Product;

use Mini\Backend\Block\BackendShell;
use Mini\Catalog\Block\Backend\ProductAdd;
use Mini\Core\Api\PageBuilder;
use Mini\Core\RequestHandler;
use Mini\Core\Response;

/**
 * @author Patrick van Bergen
 */
class Add extends RequestHandler
{

    public function createResponse(): Response
    {
        return new Response([], PageBuilder::resolve()->buildPage(BackendShell::resolve(), ProductAdd::resolve()));
    }
}