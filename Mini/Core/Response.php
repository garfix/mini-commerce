<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Response
{
    /** @var []string]*/
    protected $headers;

    /** @var string */
    protected $body;

    public function __construct(array $headers, string $body)
    {
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}