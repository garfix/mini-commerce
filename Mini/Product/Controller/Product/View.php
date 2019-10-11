<?php

namespace Mini\Product\Controller\Product;

use Mini\Core\Api\PageBuilder;
use Mini\Core\RequestHandler;
use Mini\Core\Response;
use Mini\Frontend\Block\FrontendShell;
use Mini\Product\Block\ProductMain;
use Mini\Product\ProductPageContext;

/**
 * @author Patrick van Bergen
 */
class View extends RequestHandler
{
    public function createResponse(): Response
    {
        ProductPageContext::setProductId(1);

        return new Response([], PageBuilder::resolve()->buildPage(FrontendShell::resolve(), ProductMain::resolve()));
    }
}