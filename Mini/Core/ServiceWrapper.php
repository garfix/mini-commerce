<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ServiceWrapper
{
    /** @var Service */
    protected $innerService;

    public function __construct(Service $innerService)
    {
        $this->innerService = $innerService;
    }
}