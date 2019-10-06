<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class RequestHandler
{
    public abstract function createResponse(): Response;
}