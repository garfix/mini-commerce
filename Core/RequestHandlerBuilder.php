<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class RequestHandlerBuilder
{
    public function buildRequestHandler(Request $request): RequestHandler
    {
        return new RequestHandler();
    }
}