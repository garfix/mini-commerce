<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class RequestHandler404 extends RequestHandler
{

    public function getResponse(): Response
    {
        return new Response(['HTTP/1.0 404 Not Found'], "Page not found");
    }
}