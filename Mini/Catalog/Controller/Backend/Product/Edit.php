<?php

namespace Mini\Catalog\Controller\Backend\Product;

use Mini\Backend\Block\BackendShell;
use Mini\Catalog\Api\ProductSaverService;
use Mini\Catalog\Block\Backend\ProductEdit;
use Mini\Catalog\ProductPageContext;
use Mini\Core\Api\Link;
use Mini\Core\Api\PageBuilder;
use Mini\Core\Context;
use Mini\Core\RequestHandler;
use Mini\Core\Response;

/**
 * @author Patrick van Bergen
 */
class Edit extends RequestHandler
{

    public function createResponse(): Response
    {
        $productId = Context::getRequest()->getGet()['id'];

        ProductPageContext::setProductId($productId);

        if ($post = Context::getRequest()->getPost()) {
            $name = $post['name'];
            $price = $post['price'];

            ProductSaverService::resolve()->storeAttribute($productId, 'name', $name);
            ProductSaverService::resolve()->storeAttribute($productId, 'price', $price);
            return new Response(["Location: " . Link::resolve()->create('page=catalog/product/all')], "");
        }

        return new Response([], PageBuilder::resolve()->buildPage(BackendShell::resolve(), ProductEdit::resolve()));
    }
}