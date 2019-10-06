<?php

namespace Mini\Product\Controller\Product;

use Mini\Core\PageBuilder;
use Mini\Core\RequestHandler;
use Mini\Core\Response;
use Mini\Product\Block\ProductMain;
use Mini\Product\ProductPageContext;

/**
 * @author Patrick van Bergen
 */
class View extends RequestHandler
{
    public function createResponse(): Response
    {
        $pageBuilder = new PageBuilder();

        ProductPageContext::setProductId(1);

        return new Response([], $pageBuilder->buildPage(ProductMain::class));
    }
}