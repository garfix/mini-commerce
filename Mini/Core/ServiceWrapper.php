<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ServiceWrapper
{
    /** @var Service */
    protected $innerService;

    public function __construct($innerService)
    {
        $this->innerService = $innerService;
    }
}