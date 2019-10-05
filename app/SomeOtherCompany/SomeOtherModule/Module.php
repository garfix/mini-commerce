<?php

namespace SomeOtherCompany\SomeOtherModule;

use Mini\Core\BasicModule;

/**
 * @author Patrick van Bergen
 */
class Module extends BasicModule
{
    public function getFrontName()
    {
        return 'some-other';
    }
}