<?php

namespace Mini\Dashboard\Controller;

use Mini\Core\RequestHandler;
use Mini\Core\Response;

/**
 * @author Patrick van Bergen
 */
class View extends RequestHandler
{

    public function createResponse(): Response
    {
        return new Response([], "dashboard");
    }
}