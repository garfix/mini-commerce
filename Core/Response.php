<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Response
{
    public function getHeaders(): array
    {
        return [];
    }

    public function getBody(): string
    {
        return "-- body --";
    }
}