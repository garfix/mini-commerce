<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Request
{
    /**
     * @var array
     */
    protected $server;

    /**
     * @var array
     */
    protected $get;
    /**
     * @var array
     */
    protected $post;

    public function __construct(array $server, array $get, array $post)
    {
        $this->server = $server;
        $this->get = $get;
        $this->post = $post;
    }

    /**
     * @return array
     */
    public function getRequestUri(): string
    {
        return $this->server['REQUEST_URI'];
    }

    /**
     * Returns the request uri without the parameters
     * @return string
     */
    public function getBaseUri(): string
    {
        preg_match('/^([^?]*)/', $this->server['REQUEST_URI'], $matches);
        return $matches[1];
    }

    /**
     * @return array
     */
    public function getGet(): array
    {
        return $this->get;
    }

    /**
     * @return array
     */
    public function getPost(): array
    {
        return $this->post;
    }
}