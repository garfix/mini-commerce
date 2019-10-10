<?php

namespace Mini\Backend\Controller\Product;

use Mini\Core\PageBuilder;
use Mini\Core\RequestHandler;
use Mini\Core\Response;
use Mini\Product\Block\ProductMain;
use Mini\Product\ProductPageContext;

/**
 * @author Patrick van Bergen
 */
class BackendHandler extends RequestHandler
{
    public function createResponse(): Response
    {
        ProductPageContext::setProductId(1);

        return new Response([], PageBuilder::resolve()->buildPage(ProductMain::resolve()));
    }
}