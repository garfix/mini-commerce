<?php

namespace Mini\Product\Controller\Product;

use Mini\Core\RequestHandler;
use Mini\Core\Response;

/**
 * @author Patrick van Bergen
 */
class View extends RequestHandler
{
    public function getResponse(): Response
    {
        return new Response([], "product!");
    }
}