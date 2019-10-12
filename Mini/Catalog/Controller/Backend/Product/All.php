<?php

namespace Mini\Catalog\Controller\Backend\Product;

use Mini\Core\RequestHandler;
use Mini\Core\Response;

/**
 * @author Patrick van Bergen
 */
class All extends RequestHandler
{

    public function createResponse(): Response
    {
        return new Response([], 'all');
    }
}