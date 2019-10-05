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